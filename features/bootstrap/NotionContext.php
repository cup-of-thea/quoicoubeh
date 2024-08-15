<?php

use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\ValueObjects\Notion\NotionPost;
use App\Domain\ValueObjects\Notion\NotionPostCover;
use App\Domain\ValueObjects\NotionPostCollection;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Hook\AfterScenario;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mockery\MockInterface;
use Tests\TestCase;

class NotionContext extends TestCase implements Context
{
    use WithFaker;

    private readonly MockInterface $notionPostsRepository;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        putenv('DB_CONNECTION=sqlite');
        putenv('DB_DATABASE=:memory:');
        putenv('MONGO_DATABASE=testing');
        parent::SetUp();
    }

    #[AfterScenario]
    public function after(): void
    {
        $this->artisan('migrate:rollback');
    }

    #[Given('/^the following posts exist in Notion:$/')]
    public function theFollowingPostsExist(TableNode $table): void
    {
        $posts = new NotionPostCollection();
        collect($table->getHash())->each(fn($row) => $posts->add(
            NotionPost::from(
                $this->faker->uuid,
                Carbon::now(),
                Carbon::now(),
                Carbon::parse($row['date']),
                NotionPostCover::from(
                    $this->faker->imageUrl(),
                    $this->faker->sentence,
                    $this->faker->url,
                ),
                $row['title'],
                str($row['title'])->slug(),
                $this->faker->sentence,
                $row['category'] ?? null,
                $row['series'] ?? null,
                isset($row['tags'])
                    ? explode(',', $row['tags'])
                    : [],
            )
        ));

        $this->notionPostsRepository = $this->mock(
            INotionPostsRepository::class,
            function ($mock) use ($posts) {
                $mock->shouldReceive('getPosts')->andReturn($posts);
            }
        );
    }

    #[When('/^I run the command to import posts$/')]
    public function iRunTheCommandToImportPosts(): void
    {
        $this->artisan('app:notion-sync');
    }

    #[Then('/^I should have the following posts:$/')]
    public function iShouldHaveTheFollowingPosts(TableNode $table): void
    {
        $expected = $table->getHash();
        // Get the actual posts from the database
        $actual = DB::table('posts')
            ->orderBy('date', 'desc')
            ->get(['title', 'slug', 'date'])
            ->map(fn($post) => [
                'title' => $post->title,
                'slug' => $post->slug,
                'date' => Carbon::parse($post->date)->format('Y-m-d'),
            ])
            ->toArray();
        $this->assertEquals($expected, $actual);
    }
}