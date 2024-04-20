<?php

namespace App\Domain\DomainService;

use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostIndexCollection;

readonly final class TopPostsDomainService
{
    const SMALL_LIMIT = 4;

    public function __construct(
        private ILikePostsRepository $likePostsRepository,
        private IPostsRepository $postsRepository
    ) {
    }

    public function getMostLikedPosts(): PostIndexCollection
    {
        $likedPostIds = $this->likePostsRepository->getMostLikedPostIds();

        return $this->postsRepository->getPostsByIds($likedPostIds->take(self::SMALL_LIMIT));
    }

    public function getMostReadPosts(): PostIndexCollection
    {
        return $this->postsRepository->getMostReadPosts(self::SMALL_LIMIT);
    }

    public function getMostRecentPosts(): PostIndexCollection
    {
        return $this->postsRepository->getLastPosts(self::SMALL_LIMIT);
    }
}