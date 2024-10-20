<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait HasStoredIcon
{
    public function storedIcon(): Attribute
    {
        return Attribute::make(fn() => Storage::url($this->icon));
    }
}