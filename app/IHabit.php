<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IHabit extends Model
{
    protected $fillable = [
        'id', 'property_id', 'habit_id'
    ];

    public function habit()
    {
        return $this->hasOne('App\Habit', 'id', 'habit_id');
    }
}
