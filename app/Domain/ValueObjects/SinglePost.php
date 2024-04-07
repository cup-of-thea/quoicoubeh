<?php

namespace App\Domain\ValueObjects;

use Carbon\Carbon;

readonly final class SinglePost
{
    public function __construct(
        public PostId $id,
        public string $title,
        public string $slug,
        public ?string $description,
        public string $content,
        public Carbon $date,
        public Reading $reading,
        public ?PostItemCategory $category,
    )
    {
    }
}
