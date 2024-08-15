<?php

namespace Tests\Feature\Domain\UseCases\Queries;

use App\Domain\Adapters\Repositories\IStreamsRepository;
use App\Domain\UseCases\Queries\Streams\GetStreamsQuery;
use App\Domain\ValueObjects\StreamCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetStreamsQueryTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic test example.
     */
    public function test_it_get_lasts_notion_streams(): void
    {
        // Given
        $mock = $this->mock(IStreamsRepository::class, function ($mock) {
            $mock->shouldReceive('getStreams')->andReturn($this->streamsFromNotionApi());
        });
        // When
        $streams = (new GetStreamsQuery($mock))->execute();
        // Then
        $this->assertCount(2, $streams);
    }

    private function streamsFromNotionApi(): StreamCollection
    {
        return new StreamCollection(
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
