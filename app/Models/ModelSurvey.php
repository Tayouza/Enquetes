<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSurvey extends Model
{
    use HasFactory;

    protected $table = 'surveys';
    
    /**
    * relationship between user column and survey column.
    *
    * @return void
    */

    public function relSurveys()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
