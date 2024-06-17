<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class Dimensions implements Wireable
{
    private function __construct(public int $rows, public int $cols) {
    }

    public static function from(int $rows, int $cols): Dimensions {
        return new self($rows, $cols);
    }
    public function toLivewire(): array
    {
        return [
            'rows' => $this->rows,
            'cols' => $this->cols,
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            rows: $value['rows'],
            cols: $value['cols'],
        );
    }
}
