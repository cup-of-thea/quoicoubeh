<?php

namespace Tests\Feature\Domain\UseCases\Queries;

use App\Domain\Adapters\Repositories\INotionPostsRepository;
use App\Domain\UseCases\Queries\Posts\GetNotionPostsQuery;
use App\Domain\ValueObjects\NotionPostCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetNotionPostsQueryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_it_gets_lasts_notion_posts(): void
    {
        // Given
        $mock = $this->mock(INotionPostsRepository::class, function ($mock) {
            $mock->shouldReceive('getPosts')->andReturn($this->postsFromNotionApi());
        });
        // When
        $postCollection = (new GetNotionPostsQuery($mock))->execute();
        // Then
        $this->assertCount(2, $postCollection->posts);
    }

    private function postsFromNotionApi(): NotionPostCollection
    {
        return new NotionPostCollection(
            collect(
                [
                    [
                        'cover' => [
                            'type' => 'url',
                            'url' => 'https://example.com/cover.jpg',
                        ],
                        'icon' => [
                            'type' => 'url',
                            'url' => 'https://example.com/icon.jpg',
                        ],
                        'properties' => [
                            'Coverlink' => [
                                'url' => 'https://example.com/coverlink.jpg',
                            ],
                            'Name' => [
                                'title' => [
                                    [
                                        'plain_text' => 'Stream 1',
                                    ],
                                ],
                            ],
                            'Category' => [
                                'select' => [
                                    'name' => 'Category 1',
                                    'color' => 'color 1',
                                ],
                            ],
                            'Date' => [
                                'date' => [
                                    'start' => '2022-01-01',
                                ],
                            ],
                        ],
                    ],
                    [
                        'cover' => [
                            'type' => 'url',
                            'url' => 'https://example.com/cover.jpg',
                        ],
                        'icon' => [
                            'type' => 'url',
                            'url' => 'https://example.com/icon.jpg',
                        ],
                        'properties' => [
                            'Coverlink' => [
                                'url' => 'https://example.com/coverlink.jpg',
                            ],
                            'Name' => [
                                'title' => [
                                    [
                                        'plain_text' => 'Stream 2',
                                    ],
                                ],
                            ],
                            'Category' => [
                                'select' => [
                                    'name' => 'Category 2',
                                    'color' => 'color 2',
                                ],
                            ],
                            'Date' => [
                                'date' => [
                                    'start' => '2022-01-02',
                                ],
                            ],
                        ],
                    ],
                ]
            )
        );
    }
}
