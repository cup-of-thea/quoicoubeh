<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

readonly class TagId implements Wireable
{
    private function __construct(public int $value) {
    }

    public static function from(int $value): TagId {
        return new self($value);
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->value
        ];
    }

    public static function fromLivewire($value): TagId
    {
        return TagId::from($value['id']);
    }
}
