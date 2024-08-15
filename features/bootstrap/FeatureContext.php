<?php

use App\Adapters\Repositories\WritePostsRepository;
use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\UseCases\Commands\CreatePostCommand;
use App\Domain\UseCases\Commands\PostCreator;
use App\Domain\ValueObjects\PostId;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Hook\AfterScenario;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context
{
    use WithFaker;

    private CreatePostCommand $createPostsCommand;
    private Collection $mostLikedPosts;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->createPostsCommand = new CreatePostCommand(new WritePostsRepository());
        parent::SetUp();
    }

    #[AfterScenario]
    public function after(): void
    {
        $this->artisan('migrate:rollback');
    }

    #[Given('/^the following posts with likes exist:$/')]
    public function theFollowingPostsExist(TableNode $table): void
    {
        foreach ($table->getHash() as $row) {
            $id = $this->createPostsCommand->create(
                PostCreator::from(
                    title: $row['title'],
                    slug: str($row['title'])->slug(),
                    filePath: str($row['title'])->slug()->append('.md'),
                    date: now()
                )
            );
            foreach (range(1, $row['likes']) as $ignored) {
                app(ILikePostsRepository::class)->like($id, $this->faker->ipv4);
            }
        }
    }

    #[When('/^I get the most liked posts$/')]
    public function iGetTheMostLikedPosts(): void
    {
        $this->mostLikedPosts = app(ILikePostsRepository::class)->getMostLikedPostIds();
    }

    #[Then('/^I should have the following most liked posts:$/')]
    public function iShouldHaveTheFollowingMostLikedPosts(TableNode $table): void
    {
        $expected = $table->getHash();
        $actual = $this->mostLikedPosts->map(
            fn(PostId $id) => ['title' => DB::table('posts')->where('id', $id->value)->first()->title]
        )->all();

        $this->assertEquals($expected, $actual);
    }
}
