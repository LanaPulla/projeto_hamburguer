<?php

namespace App\Repositories\Infrastructure\Eloquent;

interface BurgerRepositoryInterface
{
    public function saveBurger($attributes);
    public function deleteBurger($id);
    public function findAll($id);
    public function findBurgerById($id);
    public function getOptional();
    public function getBread();
    public function getMeat();


}