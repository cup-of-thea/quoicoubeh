<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

readonly class Reading implements Wireable
{

    private function __construct(
        public int $readingTime,
        public int $readingCount,
    )
    {
    }

    public function getReadingTime(): string
    {
        return $this->readingTime . ' min';
    }

    public function getReadingCount(): string
    {
        if ($this->readingCount === 0) {
            return 'Nouveau post';
        }

        return $this->readingCount > 1 ? $this->readingCount . ' lectures' : $this->readingCount . ' lecture';
    }

    public static function from(
        int $readingTime,
        int $readingCount,
    ): Reading
    {
        return new self(
            readingTime: $readingTime,
            readingCount: $readingCount,
        );
    }
    public function toLivewire(): array
    {
        return [
            'readingTime' => $this->readingTime,
            'readingCount' => $this->readingCount,
        ];
    }

    public static function fromLivewire($value): Reading
    {
        return new self(
            readingTime: $value['readingTime'],
            readingCount: $value['readingCount'],
        );
    }
}
