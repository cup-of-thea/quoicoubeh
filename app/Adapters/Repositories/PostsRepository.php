<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Exceptions\NotFoundException;
use App\Domain\ValueObjects\CategoryId;
use App\Domain\ValueObjects\Dimensions;
use App\Domain\ValueObjects\Episode;
use App\Domain\ValueObjects\PostId;
use App\Domain\ValueObjects\PostIndex;
use App\Domain\ValueObjects\PostIndexCollection;
use App\Domain\ValueObjects\PostItemCategory;
use App\Domain\ValueObjects\PostYear;
use App\Domain\ValueObjects\PostYearsCollection;
use App\Domain\ValueObjects\Reading;
use App\Domain\ValueObjects\Review;
use App\Domain\ValueObjects\SeriesId;
use App\Domain\ValueObjects\SinglePost;
use App\Domain\ValueObjects\TagId;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostsRepository implements IPostsRepository
{
    const LIMIT_POSTS = 500;
    const POST_INDEX_COLUMNS = [
        'p.id',
        'p.title',
        'p.slug',
        'p.description',
        'p.date',
        'p.image',
        'p.image_alt',
        'c.id as category_id',
        'c.title as category_title',
        'c.slug as category_slug',
        's.title as series_title',
        's.slug as series_slug',
        'e.episode_number',
        'pm.reading_time',
        'pm.reading_count',
        'pm.review_authors',
        'pm.rows',
        'pm.cols',
    ];

    public function getLastPosts(int $limit = 10): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->orderBy('date', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getYears(): PostYearsCollection
    {
        $years = DB::table('posts')
            ->selectRaw('YEAR(date) as year, COUNT(*) as count')
            ->distinct()
            ->orderBy('year', 'desc')
            ->groupBy('year')
            ->get()
            ->map(fn($year) => PostYear::from($year->year, $year->count));

        return new PostYearsCollection(...$years);
    }

    /**
     * @throws NotFoundException
     */
    public function getPost(string $slug): SinglePost
    {
        $post = DB::table('posts as p')
            ->select(
                'p.id',
                'p.title',
                'p.slug',
                'p.description',
                'p.content',
                'p.date',
                'c.id as category_id',
                'c.title as category_title',
                'c.slug as category_slug',
                'pm.reading_time',
                'pm.reading_count'
            )
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->where('p.slug', $slug)
            ->first();

        return $post ? $this->hydrateSinglePost($post) : throw new NotFoundException();
    }

    public function incrementReadingCount(string $slug): void
    {
        DB::table('post_meta')
            ->where('post_id', DB::table('posts')->where('slug', $slug)->value('id'))
            ->increment('reading_count');
    }

    public function getPostsFromCategory(CategoryId $categoryId): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->orderBy('date', 'desc')
            ->where('c.id', $categoryId->value)
            ->limit(self::LIMIT_POSTS)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getPostsFromTag(TagId $tagId): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->join('post_tag as pt', 'p.id', '=', 'pt.post_id')
            ->join('tags as t', 'pt.tag_id', '=', 't.id')
            ->where('t.id', $tagId->value)
            ->orderBy('date', 'desc')
            ->limit(self::LIMIT_POSTS)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getPostsFromYear(int $year): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->whereYear('date', $year)
            ->orderBy('date', 'desc')
            ->limit(self::LIMIT_POSTS)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getSeriesEpisodes(SeriesId $seriesId): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->where('e.series_id', $seriesId->value)
            ->orderBy('e.episode_number')
            ->limit(self::LIMIT_POSTS)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getRandomPostSlug(): string
    {
        return DB::table('posts')
            ->inRandomOrder()
            ->limit(1)
            ->value('slug');
    }

    public function getMostReadPosts(int $limit = 10): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->orderBy('pm.reading_count', 'desc')
            ->limit($limit)
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    public function getPostsByIds(Collection $likedPostIds): PostIndexCollection
    {
        $items = $this->postIndexBuilder()
            ->whereIn('p.id', $likedPostIds->map(fn($postId) => $postId->value)->toArray())
            ->get()
            ->map(fn($post) => $this->hydratePostIndex($post));

        return new PostIndexCollection(...$items);
    }

    private function hydratePostIndex($post): PostIndex
    {
        return new PostIndex(
            PostId::from($post->id),
            $post->title,
            $post->slug,
            $post->description,
            new Carbon($post->date),
            $post->category_id
                ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                : null,
            $post->episode_number
                ? Episode::from($post->episode_number, $post->series_title, $post->series_slug)
                : null,
            Reading::from($post->reading_time, $post->reading_count),
            $post->review_authors
                ? Review::from($post->review_authors)
                : null,
            $post->image,
            $post->image_alt,
            Dimensions::from($post->rows, $post->cols),
        );
    }

    private function hydrateSinglePost(object $post): SinglePost
    {
        return new SinglePost(
            PostId::from($post->id),
            $post->title,
            $post->slug,
            $post->description,
            $post->content,
            new Carbon($post->date),
            Reading::from($post->reading_time, $post->reading_count),
            $post->category_id
                ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                : null,
        );
    }

    private function postIndexBuilder(): Builder
    {
        return DB::table('posts as p')
            ->select(...self::POST_INDEX_COLUMNS)
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->leftJoin('episodes as e', 'p.id', '=', 'e.post_id')
            ->leftJoin('series as s', 'e.series_id', '=', 's.id');
    }
}
