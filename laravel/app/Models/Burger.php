<?php

namespace App\Models;

use App\Domain\Types\OptionalTypes;
use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
    protected $appends = ['meat_name','optional_name', 'bread_name'];
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

    public function getOptionalNameAttribute(){

        $salami = $this->optional->salami ? OptionalTypes::SALAMI : '';
        $cheddar = $this->optional->cheddar ? OptionalTypes::CHEDDAR : '';
        $red_onion = $this->optional->red_onion ? OptionalTypes::RED : '';
        $bacon = $this->optional->bacon ? OptionalTypes::BACON : '';
        $tomato = $this->optional->tomato ? OptionalTypes::TOMATO : '';
        $cucumber = $this->optional->cucumber ? OptionalTypes::CUCUMBER : '';

        $optionals = [$salami,$cheddar,$red_onion,$bacon,$tomato,$cucumber];

        return array_values(array_filter($optionals));
    }
    public function getMeatNameAttribute(){
        return $this->meat->name;
    }

    public function getBreadNameAttribute(){
        return $this->bread->name;
    }
}
