<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotesModel extends Model
{
    use HasFactory;
    
    protected $table = 'surveys';
    protected $fillable = ['title', 'answers', 'created_at', 'updated_at', 'ended_at'];
}
