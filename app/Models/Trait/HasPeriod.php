<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasPeriod
{
    public function date(): Attribute
    {
        return Attribute::make(
            function () {
                if ($this->start->isSameDay($this->end)) {
                    return $this->start->isoFormat('LLL') . ' - ' . $this->end->isoFormat('LT');
                }
                return $this->start->isoFormat('LLL') . ' - ' . $this->end->isoFormat('LLL');
            }
        );
    }
}