<?php

namespace App\Domain\UseCases\Queries\Streams;

use App\Domain\Adapters\Repositories\IStreamsRepository;
use App\Domain\ValueObjects\StreamCollection;

readonly final class GetStreamsQuery
{
    public function __construct(private IStreamsRepository $streamsRepository)
    {
    }

    public function execute(): StreamCollection
    {
        return $this->streamsRepository->getStreams();
    }
}