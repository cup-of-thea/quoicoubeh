<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\IWritePostsRepository;
use App\Domain\UseCases\Commands\PostCreator;
use App\Domain\ValueObjects\PostId;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class WritePostsRepository implements IWritePostsRepository
{
    public function create(PostCreator $postCreator): PostId
    {
        DB::table('posts')->insert([
            'title' => $postCreator->title,
            'slug' => $postCreator->slug,
            'filePath' => $postCreator->filePath,
            'date' => $postCreator->date
        ]);

        return PostId::from(DB::table('posts')->where('slug', $postCreator->slug)->first()->id);
    }

    /**
     * @param Collection<PostCreator> $posts
     */
    public function createMany(Collection $posts): void
    {
        DB::table('posts')->insert(
            $posts->map(fn($post) => [
                'title' => $post->title,
                'slug' => $post->slug,
                'filePath' => $post->id,
                'date' => $post->date
            ])->toArray()
        );
    }
}