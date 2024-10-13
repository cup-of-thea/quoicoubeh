<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function date(): Attribute
    {
        return Attribute::make(
            fn($value) => Carbon::parse($value)
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function meta(): HasMany
    {
        return $this->hasMany(PostMeta::class);
    }

    public function episode(): HasOne
    {
        return $this->hasOne(Episode::class);
    }

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'episodes')
            ->withPivot('episode_number');
    }
}
