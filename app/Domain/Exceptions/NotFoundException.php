<?php

namespace App\Domain\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function report(): void
    {
        abort(404);
    }
}
