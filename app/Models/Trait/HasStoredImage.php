<?php

namespace App\Models\Trait;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait HasStoredImage
{
    public function storedImage(): Attribute
    {
        return Attribute::make(fn() => Storage::url($this->image));
    }
}