<?php

namespace Tests\Feature\Domain\UseCases\Queries;

use App\Adapters\NotionService;
use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\UseCases\Queries\Posts\GetNotionPostsQuery;
use App\Domain\ValueObjects\NotionPostCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetNotionPostsQueryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_gets_lasts_notion_posts(): void
    {
        // Given
        $mock = $this->mock(INotionPostsRepository::class, function ($mock) {
            $mock->shouldReceive('getPosts')->andReturn($this->postsFromNotionApi());
        });
        // When
        $postCollection = (new GetNotionPostsQuery($mock))->execute();
        // Then
        $this->assertCount(3, $postCollection->posts);
    }

    public function test_it_gets_notion_posts_distinct_categories(): void
    {
        // Given
        $mock = $this->mock(INotionPostsRepository::class, function ($mock) {
            $mock->shouldReceive('getPosts')->andReturn($this->postsFromNotionApi());
        });
        // When
        $postCollection = (new GetNotionPostsQuery($mock))->execute();
        // Then
        $this->assertCount(2, $postCollection->categories());
    }


    private function postsFromNotionApi(): NotionPostCollection
    {
        $rawValues = [
            [
                'id' => '1',
                'created_time' => '2022-01-01T00:00:00.000Z',
                'last_edited_time' => '2022-01-01T00:00:00.000Z',
                'cover' => [
                    'type' => 'external',
                    'external' => [
                        'url' => 'https://example.com/cover.jpg',
                    ],
                ],
                'icon' => [
                    'type' => 'url',
                    'url' => 'https://example.com/icon.jpg',
                ],
                'properties' => [
                    'Titre' => [
                        'title' => [
                            [
                                'plain_text' => 'Stream 1',
                            ],
                        ],
                    ],
                    'Catégorie' => [
                        'select' => [
                            'name' => 'Category 1',
                            'color' => 'color 1',
                        ],
                    ],
                    'Série' => [
                        'select' => [
                            'name' => 'Série 1',
                        ],
                    ],
                    'Tags' => [
                        'multi_select' => [
                            [
                                'name' => 'Tag 1',
                            ],
                            [
                                'name' => 'Tag 2',
                            ],
                        ],
                    ],
                    'Date' => [
                        'date' => [
                            'start' => '2022-01-01',
                        ],
                    ],
                    'Cover Author Link' => [
                        'url' => 'https://example.com/coverauthorlink.jpg',
                    ],
                    'Cover Alt' => [
                        'rich_text' => [
                            [
                                'text' => [
                                    'content' => 'Cover Alt 1',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => '2',
                'created_time' => '2022-01-02T00:00:00.000Z',
                'last_edited_time' => '2022-01-02T00:00:00.000Z',
                'cover' => [
                    'type' => 'external',
                    'external' => [
                        'url' => 'https://example.com/cover.jpg',
                    ],
                ],
                'icon' => [
                    'type' => 'url',
                    'url' => 'https://example.com/icon.jpg',
                ],
                'properties' => [
                    'Titre' => [
                        'title' => [
                            [
                                'plain_text' => 'Stream 2',
                            ],
                        ],
                    ],
                    'Catégorie' => [
                        'select' => [
                            'name' => 'Category 2',
                            'color' => 'color 2',
                        ],
                    ],
                    'Série' => [
                        'select' => [
                            'name' => 'Série 2',
                        ],
                    ],
                    'Tags' => [
                        'multi_select' => [
                            [
                                'name' => 'Tag 1',
                            ],
                            [
                                'name' => 'Tag 2',
                            ],
                        ],
                    ],
                    'Date' => [
                        'date' => [
                            'start' => '2022-01-02',
                        ],
                    ],
                    'Cover Author Link' => [
                        'url' => 'https://example.com/coverauthorlink.jpg',
                    ],
                    'Cover Alt' => [
                        'rich_text' => [
                            [
                                'text' => [
                                    'content' => 'Stream 2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'id' => '3',
                'created_time' => '2022-03-02T00:00:00.000Z',
                'last_edited_time' => '2022-03-02T00:00:00.000Z',
                'cover' => [
                    'type' => 'external',
                    'external' => [
                        'url' => 'https://example.com/cover.jpg',
                    ],
                ],
                'icon' => [
                    'type' => 'url',
                    'url' => 'https://example.com/icon.jpg',
                ],
                'properties' => [
                    'Titre' => [
                        'title' => [
                            [
                                'plain_text' => 'Stream 3',
                            ],
                        ],
                    ],
                    'Catégorie' => [
                        'select' => [
                            'name' => 'Category 2',
                            'color' => 'color 2',
                        ],
                    ],
                    'Série' => [
                        'select' => null,
                    ],
                    'Tags' => [
                        'multi_select' => null,
                    ],
                    'Date' => [
                        'date' => [
                            'start' => '2022-03-02',
                        ],
                    ],
                    'Cover Author Link' => [
                        'url' => 'https://example.com/coverauthorlink.jpg',
                    ],
                    'Cover Alt' => [
                        'rich_text' => [],
                    ],
                ],
            ],
        ];
        return (new NotionService())->mapPosts(collect($rawValues));
    }
}
