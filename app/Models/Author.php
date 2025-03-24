<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_author');
    }
}
