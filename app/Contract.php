<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id', 'property_id', 'locator_id', 'tenant_id' , 'tenant_interest' , 'locator_pdf' , 'tenant_pdf' 
    ];

    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }
}
