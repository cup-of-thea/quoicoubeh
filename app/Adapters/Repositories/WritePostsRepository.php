<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\IWritePostsRepository;
use App\Domain\UseCases\Commands\PostCreator;
use App\Domain\ValueObjects\Notion\NotionPost;
use App\Domain\ValueObjects\NotionPostCollection;
use App\Domain\ValueObjects\PostId;
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


    public function createMany(NotionPostCollection $collection): void
    {
        DB::table('posts')->upsert(
        /** @var NotionPost $post */
            $collection->posts->map(fn($post) => [
                'title' => $post->title,
                'slug' => $post->slug,
                'description' => $post->description,
                'image' => $post->cover->url,
                'image_alt' => $post->cover->alt,
                'created_at' => $post->createdTime,
                'updated_at' => $post->lastEditedTime,
                'filePath' => $post->id,
                'date' => $post->date
            ])->toArray(), ['filePath'],
            ['title', 'slug', 'description', 'image', 'image_alt', 'created_at', 'updated_at', 'date']
        );
    }
}