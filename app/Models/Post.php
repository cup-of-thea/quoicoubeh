<?php

namespace App\Models;

use App\Domain\QueryBuilders\PostBuilder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

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

    public function cover(): Attribute
    {
        return Attribute::make(
            function () {
                if (!$this->image || str($this->image)->contains('covers/')) {
                    return $this->image
                        ? str($this->image)->startsWith('/')
                            ? ($this->image)
                            : "/$this->image"
                        : '/covers/trans-pride.webp';
                }

                return Storage::url($this->image);
            }
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

    public function meta(): HasOne
    {
        return $this->hasOne(PostMeta::class);
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

    public function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder($query);
    }
}
