<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\ValueObjects\CategoryId;
use App\Domain\ValueObjects\PostIndexCollection;
use App\Domain\ValueObjects\PostYearsCollection;
use App\Domain\ValueObjects\SeriesId;
use App\Domain\ValueObjects\SinglePost;
use App\Domain\ValueObjects\TagId;

interface IPostsRepository
{
    public function getLastPosts(): PostIndexCollection;

    public function getYears(): PostYearsCollection;

    public function getPost(string $slug): SinglePost;

    public function incrementReadingCount(string $slug): void;

    public function getPostsFromCategory(CategoryId $categoryId): PostIndexCollection;

    public function getPostsFromTag(TagId $tagId): PostIndexCollection;

    public function getPostsFromYear(int $year): PostIndexCollection;

    public function getSeriesEpisodes(SeriesId $seriesId): PostIndexCollection;

    public function getRandomPostSlug(): string;
}
