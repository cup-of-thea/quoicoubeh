<?php

namespace App\Adapters\Repositories;

use App\Domain\Adapters\Repositories\IWritePostsRepository;
use App\Domain\UseCase\Commands\PostCreator;
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
}