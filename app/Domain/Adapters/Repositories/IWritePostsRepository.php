<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\UseCases\Commands\PostCreator;
use App\Domain\ValueObjects\PostId;
use Illuminate\Support\Collection;

interface IWritePostsRepository
{
    public function create(PostCreator $postCreator): PostId;

    /**
     * @param Collection<PostCreator> $posts
     */
    public function createMany(Collection $posts): void;
}