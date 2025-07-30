<?php

namespace App\Repositories\Infrastructure\Eloquent;

interface BurgerRepositoryInterface
{
    public function saveBurger($attributes);
    public function destroy($id);
    public function findAll();
    public function findBurgerById($id);
    public function filter($attributes);
    public function updateStatus($id, $newStatus);
    public function update($attributes);
    public function getOptional();
    public function getBread();
    public function getMeat();
    public function getStatus();
}