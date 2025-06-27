<?php

namespace App\Repositories\Infrastructure\Eloquent;

use App\Domain\Types\OptionalTypes;
use App\Models\Burger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BurgerRepository implements BurgerRepositoryInterface{

    private $model;

    public function __construct(Burger $model)
    {
        $this->model = $model;

    } 

    public function saveBurger($attributes)
    {
        return Burger::create([
            'person_name' => $attributes['person_name'],
            'bread_id' => $attributes['bread_id'],
            'meat_id' => $attributes['meat_id'],
            'optional_id' => $attributes['optional_id'],
            'status_id' => $attributes['status_id'],
        ]);
        //    return $this->model->newInstance((array)$attributes)->save();

    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function findAll()
    {        
        $search = $this->model->newQuery(); 
        $burgers = $search->orderBy('status_id', 'desc')->get();
        return $burgers;
    }

    public function findBurgerById($id)
    {
        $search = $this->model->newQuery();
        return $search->where('id', '=', $id)->first();
    }

    public function getOptional()
    {
        $opcional = OptionalTypes::toList()->map(function ($item){
            return[
                'label' => $item,
                'value' => $item
            ];
        });
        return $opcional;

    }

    public function getBread()
    {
       $bread = DB::table('burger_bread')->get()->map(function ($item){ //get retorna uma collection std e entao pode ser usado map
            return [ 'value' => $item->name, 'id' => $item->id];
        });
       return $bread;
    }

    public function getMeat()
    {
        $meat = DB::table('burger_meat')->get()->map(function ($item){
            return['value' => $item->name, 'id' => $item->id];
        });
        return $meat;
    }

    public function getStatus()
    {
        $status = DB::table('burger_status')->get()->map(function ($item){
            return['value' => $item->name, 'id' => $item->id];
        });
        return $status;
    }

    public function updateStatus($id, $newStatus){
        try{
            $burger = $this->findBurgerById($id);
            $burger->status_id = $newStatus;
            $burger->save();
            return true;
        }catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
    }


}

