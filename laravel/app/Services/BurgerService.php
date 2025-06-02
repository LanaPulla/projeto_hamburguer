<?php

namespace App\Services;

use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Repositories\Infrastructure\Eloquent\OptionalRepositoryInterface;

class BurgerService {
    
    private $burger;
    private $optional;

    public function __construct(BurgerRepositoryInterface $burger, OptionalRepositoryInterface $optional){
        $this->burger = $burger;
        $this->optional = $optional;
    }

    public function saveSeparately($attributes){

        $this->optional->save($attributes->opcionais);
        
    }
}