<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

/**
 * Post
 *
 * @mixin Builder
 */
class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function surveyOption(): BelongsTo
    {
        return $this->belongsTo(SurveyOption::class);
    }
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
