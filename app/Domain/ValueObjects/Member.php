<?php

namespace App\Domain\ValueObjects;

readonly final class Member
{
    public function __construct(
        public string $name,
        public string $link,
        public string $avatar
    ) {
    }

    public static function from(
        string $name,
        string $link,
        string $avatar
    ): Member {
        return new self(
            name: $name,
            link: $link,
            avatar: $avatar
        );
    }
}