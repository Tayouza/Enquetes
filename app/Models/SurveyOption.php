<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Post
 *
 * @mixin Builder
 */

class SurveyOption extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
