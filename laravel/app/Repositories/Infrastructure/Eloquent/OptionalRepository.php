<?php

namespace App\Repositories\Infrastructure\Eloquent;

use App\Domain\Types\OptionalTypes;
use App\Models\Optional;

class OptionalRepository implements OptionalRepositoryInterface{

    public $model;

    public function __construct(Optional $model)
    {
        $this->model = $model;
    }

    public function save($attributes){

         $salami = false;
         $cheddar = false;
         $red_onion = false;
         $bacon = false;
         $tomato = false;
         $cucumber = false;

        foreach($attributes as $opcionalItem){
            switch ($opcionalItem){
                case OptionalTypes::SALAMI: $salami = true; break;
                case OptionalTypes::CHEDDAR: $cheddar = true; break;
                case OptionalTypes::RED: $red_onion = true; break;
                case OptionalTypes::BACON: $bacon = true; break;
                case OptionalTypes::TOMATO: $tomato = true; break;
                case OptionalTypes::CUCUMBER: $cucumber = true; break;
            }
        }

        $data = [
            'salami'     => $salami,
            'cheddar'    => $cheddar,
            'red_onion'  => $red_onion,
            'bacon'      => $bacon,
            'tomato'     => $tomato,
            'cucumber'   => $cucumber,
        ];

        return $this->model->create($data);

    }
}
