<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id', 'property_id'
    ];

    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }
}
