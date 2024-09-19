<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostIndex;
use App\Domain\ValueObjects\PostIndexCollection;
use Illuminate\Support\Collection;

readonly class GetLastPostsQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(): PostIndexCollection
    {
        return $this->postsRepository->getLastPosts();
    }

    public function getFeedItems(): Collection
    {
        $posts = $this->postsRepository->getLastPosts();

        $collection = collect();
        /** @var PostIndex $post */
        foreach ($posts as $post) {
            $collection->push($post->toFeedItem());
        }
        return collect($collection);
    }
}
