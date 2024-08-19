<?php

namespace App\Domain\UseCase\Queries\Categories;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\PostIndexCollection;

readonly class PostsOfTheWeekQuery
{
    public function __construct(
        private IPostsRepository $postsRepository,
        private ITaxonomiesRepository $taxonomiesRepository
    ) {
    }

    public function get(): PostIndexCollection
    {
        $singleCategory = $this->taxonomiesRepository->getSingleCategory('les-posts-de-la-semaine');

        return $this->postsRepository->getPostsFromCategory($singleCategory->id);
    }
}
