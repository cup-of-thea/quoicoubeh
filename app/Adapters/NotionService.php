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
}
