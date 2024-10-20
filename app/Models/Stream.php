<?php

namespace App\Models;

use App\Domain\QueryBuilders\StreamBuilder;
use App\Models\Trait\HasPeriod;
use App\Models\Trait\HasStoredImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory, HasStoredImage, HasPeriod;

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function newEloquentBuilder($query): StreamBuilder
    {
        return new StreamBuilder($query);
    }
}
