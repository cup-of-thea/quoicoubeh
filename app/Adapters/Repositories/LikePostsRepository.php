<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\ValueObjects\PostId;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LikePostsRepository implements ILikePostsRepository
{
    public function like(PostId $postId, ?string $ip): void
    {
        if ($ip !== null) {
            DB::connection('mongodb')
                ->collection('likes')
                ->insert([
                    'post_id' => $postId->value,
                    'ip' => $ip,
                    'created_at' => now()->format('Y-m-d H:i:s'),
                ]);
        }
    }

    public function unlike(PostId $postId, ?string $ip): void
    {
        if ($ip !== null) {
            DB::connection('mongodb')
                ->collection('likes')
                ->where('post_id', $postId->value)
                ->where('ip', $ip)
                ->delete();
        }
    }

    public function isLiked(PostId $postId, ?string $ip)
    {
        return DB::connection('mongodb')
            ->collection('likes')
            ->where('post_id', $postId->value)
            ->where('ip', $ip)
            ->exists();
    }

    public function likesCount(PostId $postId)
    {
        return DB::connection('mongodb')
            ->collection('likes')
            ->where('post_id', $postId->value)
            ->count();
    }

    public function getMostLikedPostIds(): Collection
    {
        $elements = DB::connection('mongodb')
            ->collection('likes')
            ->raw(function ($collection) {
                return $collection->aggregate([
                    [
                        '$group' => [
                            '_id' => '$post_id',
                            'count' => ['$sum' => 1],
                        ],
                    ],
                    [
                        '$sort' => ['count' => -1],
                    ],
                    [
                        '$limit' => 4,
                    ],
                ]);
            })
            ->toArray();

        return collect($elements)->pluck('_id')->map(fn($id) => PostId::from($id));
    }
}
