<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\UseCases\Commands\PostCreator;
use App\Domain\ValueObjects\PostId;

interface IWritePostsRepository
{
    public function create(PostCreator $postCreator): PostId;
}