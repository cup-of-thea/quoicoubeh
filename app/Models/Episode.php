<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function previous(): ?self
    {
        return Episode::where('series_id', $this->series_id)
            ->where('episode_number', $this->episode_number - 1)
            ->first();
    }

    public function next(): ?self
    {
        return Episode::where('series_id', $this->series_id)
            ->where('episode_number', $this->episode_number + 1)
            ->first();
    }
}
