<?php

namespace App\Repositories\Infrastructure\Eloquent;

interface BurgerRepositoryInterface
{
    public function saveBurger($id = null);
    public function deleteBurger($id);
    public function findAll($id);
    public function findBurgerById($id);

}