<?php

namespace App\Repositories\Infrastructure\Eloquent;

use App\Models\Burger;

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
}

