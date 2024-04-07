<?php

namespace App\Domain\DomainService;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\SinglePost;
use Illuminate\Support\Facades\Cache;

readonly class PostDomainService
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function getSinglePost(string $slug): SinglePost
    {
        $this->incrementReadingCount($slug);

        return Cache::remember("posts:$slug", 86400, fn() => $this->postsRepository->getPost($slug));
    }

    public function incrementReadingCount(string $slug): void
    {
        $ip = request()->ip();
        if (!Cache::has("reading:$slug:$ip")) {
            Cache::put("reading:$slug:$ip", true, 86400);
            $this->postsRepository->incrementReadingCount($slug);
        }
    }
}
