<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    protected $table = 'burger';
    protected $fillable=[
        'name',
        'birthdate'
    ];
}
