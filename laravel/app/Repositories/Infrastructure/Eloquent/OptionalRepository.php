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

   public function update($id, $attributes)
    {
        $salami = false;
        $cheddar = false;
        $red_onion = false;
        $bacon = false;
        $tomato = false;
        $cucumber = false;

        $optionalTypeMappings = OptionalTypes::toList();

        foreach ($optionalTypeMappings as $constantValue => $displayName) {
            if (in_array($displayName, $attributes)) {
                switch ($constantValue) {
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

        // Aqui é o ponto-chave: carregue o registro correto
        $optional = $this->model->findOrFail($id);

        $optional->fill($data)->save();

        return $optional;
    }

    public function destroy($optinal)
    {
       return $this->model->findOrFail($optinal)->delete();
    }

    
}
