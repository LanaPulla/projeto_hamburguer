<?php

namespace App\Repositories\Infrastructure\Eloquent;

use App\Domain\Types\OptionalTypes;
use App\Models\Burger;
use Illuminate\Support\Facades\DB;

class BurgerRepository implements BurgerRepositoryInterface{

    private $model;

    public function __construct(Burger $model)
    {
        $this->model = $model;

    } 

    public function saveBurger($id = null)
    {

    }

    public function deleteBurger($id)
    {

    }

    public function findAll($id)
    {

    }

    public function findBurgerById($id)
    {
        
    }

    public function getOptional()
    {
        $opcional = OptionalTypes::toList()->map(function ($item,$item2){
            return[
                'label' => $item,
                'value' => $item2
            ];
        });
        return $opcional;

    }

    public function getBread()
    {
       $bread = DB::table('burger_bread')->get()->map(function ($item){ //get retorna uma collection std e entao pode ser usado map
            return [ 'value' => $item->name];
        });
       return $bread;
    }

    public function getMeat()
    {
        $meat = DB::table('burger_meat')->get()->map(function ($item){
            return['value' => $item->name];
        });
        return $meat;
    }


}

