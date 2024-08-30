<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\ValueObjects\NotionPostCollection;

interface INotionPostsRepository
{
    public function getPosts(): NotionPostCollection;
}