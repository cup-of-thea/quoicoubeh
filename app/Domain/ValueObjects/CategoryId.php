<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class CategoryId implements Wireable
{
    private function __construct(public int $value) {
    }

    public static function from(int $value): CategoryId {
        return new self($value);
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->value
        ];
    }

    public static function fromLivewire($value): CategoryId
    {
        return CategoryId::from($value['id']);
    }
}
