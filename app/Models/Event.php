<?php

namespace App\Models;

use App\Domain\QueryBuilders\EventBuilder;
use App\Models\Trait\HasPeriod;
use App\Models\Trait\HasStoredIcon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, HasStoredIcon, HasPeriod;
   
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function newEloquentBuilder($query): EventBuilder
    {
        return new EventBuilder($query);
    }
}
