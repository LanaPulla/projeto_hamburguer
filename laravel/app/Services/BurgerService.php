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
            $attributes['optional_id'] = $optional->id;
    
            // Salva o burger com o optional_id corretamente preenchido
            $burger = $this->burger->saveBurger($attributes);
    
            return $burger;
        } catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
    }

    public function editSeparately($attributes)
    {
       try{
            $this->burger->update($attributes);
            $id = $attributes['id'];
            $this->optional->update($id, $attributes['optional_id']);
            return true;
       }catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
    }

     public function destroy($burgerId, $optionalId)
     {
        try{
            $this->burger->destroy($burgerId);
            $this->optional->destroy($optionalId);
        }
        catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
     }

}