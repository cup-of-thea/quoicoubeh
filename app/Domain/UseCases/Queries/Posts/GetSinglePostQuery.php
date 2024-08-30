<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\DomainService\PostDomainService;
use App\Domain\ValueObjects\SinglePost;

readonly class GetSinglePostQuery
{
    public function __construct(private PostDomainService $postDomainService)
    {
    }

    public function get(string $slug): SinglePost
    {
        return $this->postDomainService->getSinglePost($slug);
    }
}
