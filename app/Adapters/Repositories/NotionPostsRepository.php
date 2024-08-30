<?php

namespace App\Adapters\Repositories;

use App\Adapters\NotionService;
use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\ValueObjects\NotionPostCollection;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

readonly class NotionPostsRepository implements INotionPostsRepository
{
    public function __construct(private NotionService $notionService)
    {
    }

    /**
     * @throws ConnectionException
     */
    public function getPosts(): NotionPostCollection
    {
        return $this->notionService->mapPosts($this->getPostsFromNotion()->collect('results'));
    }

    /**
     * @return Response
     * @throws ConnectionException
     */
    private function getPostsFromNotion(): Response
    {
        $postsDatabaseId = '37ef237d8bce4fb58c1fe5cd7fa5fdc9';

        return Http::withHeaders($this->notionService->headers)
            ->post("https://api.notion.com/v1/databases/$postsDatabaseId/query", [
                'sorts' => [
                    [
                        'property' => 'Date',
                        'direction' => 'ascending',
                    ]
                ]
            ]);
    }
}