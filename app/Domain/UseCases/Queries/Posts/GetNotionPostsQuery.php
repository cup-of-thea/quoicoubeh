<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\ValueObjects\NotionPostCollection;

readonly final class GetNotionPostsQuery
{
    public function __construct(private INotionPostsRepository $notionPostsRepository)
    {
    }

    public function execute(): NotionPostCollection
    {
        return $this->notionPostsRepository->getPosts();
    }
}