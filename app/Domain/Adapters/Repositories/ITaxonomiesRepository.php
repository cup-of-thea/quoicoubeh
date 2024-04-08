<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\ValueObjects\CategoriesCollection;
use App\Domain\ValueObjects\PostId;
use App\Domain\ValueObjects\SeriesCollection;
use App\Domain\ValueObjects\SingleCategory;
use App\Domain\ValueObjects\SingleSeries;
use App\Domain\ValueObjects\SingleTag;
use App\Domain\ValueObjects\TagsCollection;

interface ITaxonomiesRepository
{
    public function getCategories(): CategoriesCollection;

    public function getTags(): TagsCollection;

    public function getSeries(): SeriesCollection;

    public function getPostTags(PostId $postId): TagsCollection;

    public function getSingleCategory(string $slug): SingleCategory;

    public function getSingleTag(string $slug): SingleTag;

    public function getSingleSeries(string $slug): SingleSeries;
}
