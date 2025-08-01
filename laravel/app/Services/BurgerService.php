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
            $burger = $this->burger->findBurgerById($attributes['id']);
            $optionalId = $burger->optional_id;
            $this->burger->update($attributes);
            
            $this->optional->update($optionalId, $attributes['optional_id']);
            return true;
       }catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
    }

     public function destroy($id)
     {
        try{
            
            $burger = $this->burger->findBurgerById($id);
            $optionalId = $burger->optional_id;
            // dd($optionalId);
            $this->burger->destroy($id);
            $this->optional->destroy($optionalId);
            
        }
        catch (\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), ['trace' => $ex->getTraceAsString()]);
            throw $ex;
        }
     }

}