<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\CategoryId;
use App\Domain\ValueObjects\PostId;
use App\Domain\ValueObjects\PostIndex;
use App\Domain\ValueObjects\PostIndexCollection;
use App\Domain\ValueObjects\PostItemCategory;
use App\Domain\ValueObjects\PostYear;
use App\Domain\ValueObjects\PostYearsCollection;
use App\Domain\ValueObjects\Reading;
use App\Domain\ValueObjects\SinglePost;
use App\Domain\ValueObjects\TagId;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostsRepository implements IPostsRepository
{
    public function getLastPosts(): PostIndexCollection
    {
        $items = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.description', 'p.content', 'p.date', 'c.id as category_id', 'c.title as category_title', 'c.slug as category_slug', 'pm.reading_time', 'pm.reading_count')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->orderBy('date', 'desc')
            ->limit(10)
            ->get()
            ->map(fn($post) => new PostIndex(
                PostId::from($post->id),
                $post->title,
                $post->slug,
                $post->description,
                new Carbon($post->date),
                $post->category_id
                    ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                    : null,
                Reading::from($post->reading_time, $post->reading_count)
            ));

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

    public function getPost(string $slug): SinglePost
    {
        $post = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.description', 'p.content', 'p.date',
                'c.id as category_id', 'c.title as category_title', 'c.slug as category_slug',
                'pm.reading_time', 'pm.reading_count')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->where('p.slug', $slug)
            ->first();

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

    public function incrementReadingCount(string $slug): void
    {
        DB::table('post_meta')
            ->where('post_id', DB::table('posts')->where('slug', $slug)->value('id'))
            ->increment('reading_count');
    }

    public function getPostsFromCategory(CategoryId $categoryId): PostIndexCollection
    {
        $items = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.description', 'p.content', 'p.date', 'c.id as category_id', 'c.title as category_title', 'c.slug as category_slug', 'pm.reading_time', 'pm.reading_count')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->orderBy('date', 'desc')
            ->where('c.id', $categoryId->value)
            ->limit(500)
            ->get()
            ->map(fn($post) => new PostIndex(
                PostId::from($post->id),
                $post->title,
                $post->slug,
                $post->description,
                new Carbon($post->date),
                $post->category_id
                    ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                    : null,
                Reading::from($post->reading_time, $post->reading_count)
            ));

        return new PostIndexCollection(...$items);
    }

    public function getPostsFromTag(TagId $tagId): PostIndexCollection
    {
        $items = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.description', 'p.content', 'p.date', 'c.id as category_id', 'c.title as category_title', 'c.slug as category_slug', 'pm.reading_time', 'pm.reading_count')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->join('post_tag as pt', 'p.id', '=', 'pt.post_id')
            ->join('tags as t', 'pt.tag_id', '=', 't.id')
            ->where('t.id', $tagId->value)
            ->orderBy('date', 'desc')
            ->limit(500)
            ->get()
            ->map(fn($post) => new PostIndex(
                PostId::from($post->id),
                $post->title,
                $post->slug,
                $post->description,
                new Carbon($post->date),
                $post->category_id
                    ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                    : null,
                Reading::from($post->reading_time, $post->reading_count)
            ));

        return new PostIndexCollection(...$items);
    }

    public function getPostsFromYear(int $year): PostIndexCollection
    {
        $items = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.slug', 'p.description', 'p.content', 'p.date', 'c.id as category_id', 'c.title as category_title', 'c.slug as category_slug', 'pm.reading_time', 'pm.reading_count')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->whereYear('date', $year)
            ->orderBy('date', 'desc')
            ->limit(500)
            ->get()
            ->map(fn($post) => new PostIndex(
                PostId::from($post->id),
                $post->title,
                $post->slug,
                $post->description,
                new Carbon($post->date),
                $post->category_id
                    ? PostItemCategory::from($post->category_id, $post->category_title, $post->category_slug)
                    : null,
                Reading::from($post->reading_time, $post->reading_count)
            ));

        return new PostIndexCollection(...$items);
    }
}
