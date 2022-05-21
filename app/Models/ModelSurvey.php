<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSurvey extends Model
{
    use HasFactory;

    protected $table = 'surveys';
    protected $fillable = ['title', 'answers', 'ended_at'];
    

}
