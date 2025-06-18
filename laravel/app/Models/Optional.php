<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    protected $table = 'burger_optional';
    protected $fillable=[
        'salami',
        'cheddar',
        'red_onion',
        'bacon',
        'tomato',
        'cucumber',
    ];

    public function burgers()
    {
        return $this->hasMany(Burger::class, 'optional_id');
    }
}