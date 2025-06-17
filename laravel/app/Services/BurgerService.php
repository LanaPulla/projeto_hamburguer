<?php

namespace App\Services;

use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Repositories\Infrastructure\Eloquent\OptionalRepositoryInterface;
use Illuminate\Support\Facades\Log;

class BurgerService {
    
    private $burger;
    private $optional;

    public function __construct(BurgerRepositoryInterface $burger, OptionalRepositoryInterface $optional){
        $this->burger = $burger;
        $this->optional = $optional;
    }

    public function saveSeparately($attributes)
    {
        try {
            // Primeiro, salva os opcionais e guarda o ID
            $optional = $this->optional->save($attributes['opcionais']);
    
            // Agora adiciona o ID dos opcionais aos atributos do burger
            $attributes['opcionais'] = $optional->id;
    
            // Salva o burger com o optional_id corretamente preenchido
            $burger = $this->burger->saveBurger($attributes);
    
            return $burger;
        } catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
    }
}