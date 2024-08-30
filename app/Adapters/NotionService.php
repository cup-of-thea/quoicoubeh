<?php

namespace App\Adapters;

use App\Domain\ValueObjects\Notion\NotionPost;
use App\Domain\ValueObjects\Notion\NotionPostCover;
use App\Domain\ValueObjects\NotionPostCollection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

readonly class NotionService
{
    public array $headers;

    public function __construct()
    {
        $this->headers = [
            'Authorization' => 'Bearer ' . config('services.notion.secret'),
            'Notion-Version' => config('services.notion.version'),
        ];
    }

    public function mapPosts(Collection $posts): NotionPostCollection
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
                        $this->getRichTextContent($post, 'Cover Alt') ?: '',
                        $post['properties']['Cover Author Link']['url'],
                    ),
                    $post['properties']['Titre']['title'][0]['plain_text'],
                    $this->getRichTextContent($post, 'Slug')
                        ?: str($post['properties']['Titre']['title'][0]['plain_text'])->slug(),
                    $this->getRichTextContent($post, 'Description'),
                    $this->getSelectContent($post, 'Catégorie'),
                    $this->getSelectContent($post, 'Série'),
                    $this->getMultiSelectContent($post, 'Tags')
                ))
        );
    }

    private function getMultiSelectContent($page, string $notionFieldName): array
    {
        return collect($page['properties'][$notionFieldName]['multi_select'])
            ->map(fn($tag) => $tag['name'])
            ->toArray();
    }

    private function getRichTextContent($page, string $notionFieldName): ?string
    {
        return isset($page['properties'][$notionFieldName]['rich_text'][0])
            ? $page['properties'][$notionFieldName]['rich_text'][0]['text']['content']
            : null;
    }

    private function getSelectContent($page, string $notionFieldName): ?string
    {
        return $page['properties'][$notionFieldName]['select']
            ? $page['properties'][$notionFieldName]['select']['name']
            : null;
    }
}