<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VContract extends Model
{
    protected $fillable = [
        'user_id', 'property_id', 'vacancy_id', 
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }

    public function vacancy()
    {
        return $this->hasOne('App\Vacancy', 'id', 'vacancy_id');
    }

}
