<?php

namespace App\Domain\ValueObjects\Notion;

use Illuminate\Support\Carbon;

final readonly class NotionPost
{
    public function __construct(
        public string $id,
        public Carbon $createdTime,
        public Carbon $lastEditedTime,
        public Carbon $date,
        public NotionPostCover $cover,
        public string $title,
        public string $slug,
        public ?string $description = null,
        public ?string $category = null,
        public ?string $series = null,
        public array $tags = [],
    ) {
    }

    public static function from(
        string $id,
        Carbon $createdTime,
        Carbon $lastEditedTime,
        Carbon $date,
        NotionPostCover $cover,
        string $title,
        string $slug,
        ?string $description = null,
        ?string $category = null,
        ?string $series = null,
        array $tags = [],
    ): self {
        return new self(
            id: $id,
            createdTime: $createdTime,
            lastEditedTime: $lastEditedTime,
            date: $date,
            cover: $cover,
            title: $title,
            slug: $slug,
            description: $description,
            category: $category,
            series: $series,
            tags: $tags,
        );
    }
}

final readonly class NotionPostCover
{
    public function __construct(
        public string $url,
        public string $alt,
        public ?string $authorUrl = null,
    ) {
    }

    public static function from(
        string $url,
        string $alt,
        ?string $authorUrl = null,
    ): self {
        return new self(
            url: $url,
            alt: $alt,
            authorUrl: $authorUrl,
        );
    }
}