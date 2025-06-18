<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    protected $table = 'burger';
    protected $fillable=[
        'person_name',
        'bread_id',
        'meat_id',
        'status_id',
        'optional_id',
    ];

    protected $attributes = [
        'status_id' => 0,
    ];

    public function optional()
    {
        return $this->belongsTo(Optional::class, 'optional_id');
    }

}
