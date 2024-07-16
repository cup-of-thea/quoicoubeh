<?php

namespace App\Domain\DomainService;

use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\PostIndexCollection;

readonly final class TopPostsDomainService
{
    const SMALL_LIMIT = 7;

    public function __construct(
        private ILikePostsRepository $likePostsRepository,
        private IPostsRepository $postsRepository,
        private ITaxonomiesRepository $taxonomiesRepository
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
        $discoveriesCategory = $this->taxonomiesRepository->getSingleCategory('decouvertes');

        return $this->postsRepository->getLastPosts(self::SMALL_LIMIT, [$discoveriesCategory->id->value]);
    }
}
