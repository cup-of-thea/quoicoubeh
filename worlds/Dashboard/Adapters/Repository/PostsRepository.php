<?php

namespace Worlds\Dashboard\Adapters\Repository;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Worlds\Dashboard\Domain\Adapters\Repositories\IPostsRepository;
use Worlds\Dashboard\Domain\ValueObjects\PaginatedCollection;
use Worlds\Dashboard\Domain\ValueObjects\Pagination;
use Worlds\Dashboard\Domain\ValueObjects\PaginationRequest;
use Worlds\Dashboard\Domain\ValueObjects\PostListItem;

class PostsRepository implements IPostsRepository
{
    public function getPosts(PaginationRequest $paginationRequest): PaginatedCollection
    {
        $query = $this->buildQuery();

        $pagination = new Pagination(
            perPage: $paginationRequest->perPage,
            page: $paginationRequest->page,
            total: $query->count(),
            lastPage: ceil($query->count() / $paginationRequest->perPage),
        );

        $posts = $query->paginate(perPage: $paginationRequest->perPage, page: $paginationRequest->page,)->collect();

        $tags = DB::table('post_tag as pt')
            ->join('tags as t', 'pt.tag_id', '=', 't.id')
            ->select('pt.post_id as post_id', 't.id as id', 't.title as title')
            ->whereIn('post_id', $posts->pluck('id')->toArray())
            ->get();

        $series = DB::table('series as s')
            ->join('episodes as e', 's.id', '=', 'e.series_id')
            ->join('posts as p', 'e.post_id', '=', 'p.id')
            ->select('p.id as post_id', 's.title as series', 'e.episode_number as episode')
            ->whereIn('post_id', $posts->pluck('id')->toArray())
            ->get();

        $items = $posts->map(fn($post) => PostListItem::from(
            (object)[
                'id' => $post->id,
                'title' => $post->title,
                'date' => $post->date,
                'category' => $post->category,
                'tags' => $tags->where('post_id', $post->id)->pluck('title')->toArray(),
                'series' => $series->where('post_id', $post->id)->first()?->series,
                'episode' => $series->where('post_id', $post->id)->first()?->episode,
                'views' => $post->views ?? '0',
            ]
        ));

        return new PaginatedCollection($pagination, $items);
    }

    private function buildQuery(): Builder
    {
        return DB::table('posts as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->join('post_meta as pm', 'p.id', '=', 'pm.post_id')
            ->select(
                'p.id as id',
                'p.title as title',
                'p.date as date',
                'c.title as category',
                'pm.reading_count as views'
            )
            ->orderBy('p.date', 'desc');
    }
}