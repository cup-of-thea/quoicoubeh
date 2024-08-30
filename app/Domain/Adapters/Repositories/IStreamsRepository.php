<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\ValueObjects\StreamCollection;

interface IStreamsRepository
{
    public function getStreams(): StreamCollection;
}