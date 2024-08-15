<?php

namespace App\Adapters\Repositories;

use App\Adapters\NotionService;
use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\ValueObjects\Featuring;
use App\Domain\ValueObjects\Member;
use App\Domain\ValueObjects\NotionPostCollection;
use App\Domain\ValueObjects\StreamMoment;
use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

readonly class NotionPostsRepository implements INotionPostsRepository
{
    public function __construct(private NotionService $notionService)
    {
    }

    public function getPosts(): NotionPostCollection
    {
        return $this->mapPosts();
    }

    /**
     * @throws ConnectionException
     */
    private function mapPosts(): NotionPostCollection
    {
        return $this->getPostsFromNotion()->collect('results')->map(function ($result) {
            $featuringId = '62c3eb01f0dd45ef8fdc9795eba6b5d8';
            $coverType = $result['cover']['type'] ?? null;

            $iconType = $result['icon']['type'];

            $featuring = Http::withHeaders($this->notionService->headers)
                ->post("https://api.notion.com/v1/databases/$featuringId/query", [
                    'filter' => [
                        'property' => 'Streams',
                        'relation' => [
                            'contains' => $result['id'],
                        ],
                    ],
                ]);

            return StreamMoment::from(
                cover: $coverType ? $result['cover'][$coverType]['url'] : '',
                coverReference: $result['properties']['Coverlink']['url'],
                icon: $result['icon'][$iconType]['url'],
                title: $result['properties']['Name']['title'][0]['plain_text'],
                category: $result['properties']['Category']['select']['name'],
                color: $result['properties']['Category']['select']['color'],
                date: Carbon::parse($result['properties']['Date']['date']['start']),
                featuring: new Featuring(
                    $featuring->collect('results')->map(function ($result) {
                        $coverType = $result['cover']['type'];
                        return Member::from(
                            name: $result['properties']['Name']['title'][0]['plain_text'],
                            link: $result['properties']['Link']['url'],
                            avatar: $result['cover'][$coverType]['url'] ?? ''
                        );
                    })->toArray()
                )
            );
        })->collect();
    }

    /**
     * @return Response
     * @throws ConnectionException
     */
    private function getPostsFromNotion(): Response
    {
        $streamsId = 'f86aa7b989924448998c430ec8a93fef';

        return Http::withHeaders($this->notionService->headers)
            ->post("https://api.notion.com/v1/databases/$streamsId/query", [
                'sorts' => [
                    [
                        'property' => 'Date',
                        'direction' => 'ascending',
                    ]
                ],
                'filter' => [
                    'and' => [
                        [
                            'property' => 'Date',
                            'date' => [
                                'on_or_after' => now()->format('Y-m-d'),
                            ],
                        ],
                        [
                            'property' => 'Date',
                            'date' => [
                                'on_or_before' => now()->startOfWeek()->addWeek()->endOfWeek()->format('Y-m-d'),
                            ],
                        ],
                    ],
                ],
            ]);
    }
}