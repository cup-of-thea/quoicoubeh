<?php

namespace App\Adapters;

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

    public static function getRichTextContent($page, string $notionFieldName): ?string
    {
        return isset($page['properties'][$notionFieldName]['rich_text'][0])
            ? $page['properties'][$notionFieldName]['rich_text'][0]['text']['content']
            : null;
    }

    public static function getSelectContent($page, string $notionFieldName): ?string
    {
        return $page['properties'][$notionFieldName]['select']
            ? $page['properties'][$notionFieldName]['select']['name']
            : null;
    }

    public static function getMultiSelectContent($page, string $notionFieldName): array
    {
        return collect($page['properties'][$notionFieldName]['multi_select'])
            ->map(fn($tag) => $tag['name'])
            ->toArray();
    }
}