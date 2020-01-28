<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'id', 'property_id', 'user_id', 'value', 'expenses_id', 'details_id', 'type', 'entrance', 'exit', 'title', 'description'
    ];

    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }
    
}