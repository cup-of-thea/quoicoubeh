<?php

namespace App\Domain\UseCases\Queries\Categories;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\Exceptions\NotFoundException;
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
        try {
            $singleCategory = $this->taxonomiesRepository->getSingleCategory('les-posts-de-la-semaine');
        } catch (NotFoundException) {
            return new PostIndexCollection();
        }

        return $this->postsRepository->getPostsFromCategory($singleCategory->id);
    }
}
