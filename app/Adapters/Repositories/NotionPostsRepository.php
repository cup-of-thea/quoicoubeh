<?php

namespace App\Adapters\Repositories;

use App\Adapters\NotionService;
use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\ValueObjects\Notion\NotionPost;
use App\Domain\ValueObjects\Notion\NotionPostCover;
use App\Domain\ValueObjects\NotionPostCollection;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

readonly class NotionPostsRepository implements INotionPostsRepository
{
    public function __construct(private NotionService $notionService)
    {
    }

    /** @todo : consider that maybe it's a NotionService method */
    public static function mapPosts(Collection $posts): NotionPostCollection
    {
        return new NotionPostCollection(
            collect($posts)
                ->filter(fn($post) => isset($post['cover'])
                    && isset($post['properties']['Date']['date'])
                    && $post['properties']['Catégorie']['select']
                )
                ->map(fn($post) => NotionPost::from(
                    $post['id'],
                    Carbon::parse($post['created_time']),
                    Carbon::parse($post['last_edited_time']),
                    Carbon::parse($post['properties']['Date']['date']['start']),
                    NotionPostCover::from(
                        $post['cover']['external']['url'],
                        NotionService::getRichTextContent($post, 'Cover Alt'),
                        $post['properties']['Cover Author Link']['url'],
                    ),
                    $post['properties']['Titre']['title'][0]['plain_text'],
                    NotionService::getRichTextContent($post, 'Slug')
                        ?: str($post['properties']['Titre']['title'][0]['plain_text'])->slug(),
                    NotionService::getRichTextContent($post, 'Description'),
                    NotionService::getSelectContent($post, 'Catégorie'),
                    NotionService::getSelectContent($post, 'Série'),
                    NotionService::getMultiSelectContent($post, 'Tags')
                ))
        );
    }

    /**
     * @throws ConnectionException
     */
    public function getPosts(): NotionPostCollection
    {
        return $this->mapPosts($this->getPostsFromNotion()->collect('results'));
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