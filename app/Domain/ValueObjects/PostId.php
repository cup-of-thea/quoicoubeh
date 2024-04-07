<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

readonly class PostId implements Wireable
{
    private function __construct(public int $value) {
    }

    public static function from(int $value): PostId {
        return new self($value);
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->value
        ];
    }

    public static function fromLivewire($value): PostId
    {
        return PostId::from($value['id']);
    }
}
