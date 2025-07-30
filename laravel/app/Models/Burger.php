<?php

namespace App\Models;

use App\Domain\Types\OptionalTypes;
use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    protected $appends = ['meat_name','optional_name', 'bread_name', 'status_name'];
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
        return $this->belongsTo(Optional::class);
    }

    public function meat()
    {
        return $this->belongsTo(Meat::class);
    }

    public function bread()
    {
        return $this->belongsTo(Bread::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getOptionalNameAttribute()
    {
        $optionalList = OptionalTypes::toList();

        $optionals = [];

        if ($this->optional->salami) {
            $optionals[] = $optionalList[OptionalTypes::SALAMI];
        }
        if ($this->optional->cheddar) {
            $optionals[] = $optionalList[OptionalTypes::CHEDDAR];
        }
        if ($this->optional->red_onion) {
            $optionals[] = $optionalList[OptionalTypes::RED];
        }
        if ($this->optional->bacon) {
            $optionals[] = $optionalList[OptionalTypes::BACON];
        }
        if ($this->optional->tomato) {
            $optionals[] = $optionalList[OptionalTypes::TOMATO];
        }
        if ($this->optional->cucumber) {
            $optionals[] = $optionalList[OptionalTypes::CUCUMBER];
        }

        return array_values($optionals);
    }

    public function getMeatNameAttribute()
    {
        return $this->meat->name;
    }

    public function getBreadNameAttribute()
    {
        return $this->bread->name;
    }

    public function getStatusNameAttribute()
    {
        return $this->status->name;
    }
}
