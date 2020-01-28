<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VMatch extends Model
{
    protected $fillable = [
        'id', 'vacancy_id', 'user_id'
    ];

    
}
