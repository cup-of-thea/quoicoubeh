<?php

namespace App\Domain\UseCases\Commands;

use App\Domain\Adapters\Repositories\IWritePostsRepository;
use App\Domain\ValueObjects\PostId;
use Carbon\Carbon;

readonly class CreatePostCommand
{
    public function __construct(private IWritePostsRepository $repository)
    {
    }

    public function create(PostCreator $postCreator): PostId
    {
        return $this->repository->create($postCreator);
    }
}

readonly class PostCreator
{
    private function __construct(
        public string $title,
        public string $slug,
        public string $filePath,
        public Carbon $date
    ) {
    }

    public static function from(string $title, string $slug, string $filePath, Carbon $date): self
    {
        return new self($title, $slug, $filePath, $date);
    }
}