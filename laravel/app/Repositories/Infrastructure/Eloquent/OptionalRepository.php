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

        $optionalTypeMappings = OptionalTypes::toList(); //guarda os dois dados de toList (que vem em lista)

   
    foreach ($optionalTypeMappings as $constantValue => $displayName) {
        if (in_array($displayName, $attributes)) { //verifica se o nome do front esta dentro no array attributes
            switch ($constantValue) { //verifica qual constante foi encontrada no IF
                case OptionalTypes::SALAMI:
                    $salami = true;
                    break;
                case OptionalTypes::CHEDDAR:
                    $cheddar = true;
                    break;
                case OptionalTypes::RED: 
                    $red_onion = true;
                    break;
                case OptionalTypes::BACON:
                    $bacon = true;
                    break;
                case OptionalTypes::TOMATO:
                    $tomato = true;
                    break;
                case OptionalTypes::CUCUMBER:
                    $cucumber = true;
                    break;
            }
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

    public function destroy($optinal, $id){
        // $optinalName = $optinal->optional_name; 
        // // dd($optinalName);
        // $optionalType = OptionalTypes::toList(); 

        // foreach($optionalType as $constantValue => $name){
        //     if ($name == $optinal){
        //     switch ($constantValue) { //verifica qual constante foi encontrada no IF
        //                     case OptionalTypes::SALAMI:
        //                         $salami = false;
        //                         break;
        //                     case OptionalTypes::CHEDDAR:
        //                         $cheddar = false;
        //                         break;
        //                     case OptionalTypes::RED: 
        //                         $red_onion = false;
        //                         break;
        //                     case OptionalTypes::BACON:
        //                         $bacon = false;
        //                         break;
        //                     case OptionalTypes::TOMATO:
        //                         $tomato = false;
        //                         break;
        //                     case OptionalTypes::CUCUMBER:
        //                         $cucumber = false;
        //                         break;
        //                 }
        //             }
        //     }

        // $optinalId = $this->model->newQuery();
        // $optinalId->where('id', '=', $id)->first();

        // return ;
    }

    public function update($id, $attributtes){

    }
    
}
