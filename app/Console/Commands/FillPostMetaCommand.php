<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FillPostMetaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fills post meta data, as reading time.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Filling post meta data...');

        DB::table('posts')
            ->select('id', 'content')
            ->orderBy('id')
            ->chunk(100, function ($posts) {
                foreach ($posts as $post) {
                    $readingTime = round(str($post->content)->wordCount() / 200);

                    DB::table('post_meta')
                        ->upsert([
                            'post_id' => $post->id,
                            'reading_time' => $readingTime,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ], ['post_id'], ['reading_time', 'updated_at']);
                }
            });

        $this->info('Post meta data filled.');
    }
}
