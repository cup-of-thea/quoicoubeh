<?php

namespace App\Console\Commands;

use App\Domain\UseCases\Queries\Posts\GetNotionPostsQuery;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;

class NotionSync extends Command
{
    protected $signature = 'app:notion-sync';

    protected $description = 'Fetch posts from Notion and sync them with the database.';

    public function __construct(private readonly GetNotionPostsQuery $getNotionPostsQuery)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    #[NoReturn] public function handle()
    {
        dd($this->getNotionPostsQuery->execute());
    }
}
