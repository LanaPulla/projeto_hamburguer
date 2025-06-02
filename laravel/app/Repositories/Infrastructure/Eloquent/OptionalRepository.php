<?php

namespace App\Repositories\Infrastructure\Eloquent;

use App\Domain\Types\OptionalTypes;

class OptionalRepository implements OptionalRepositoryInterface{

    public function save($attributes){
        
        foreach($opcionalItem in $attributes){
            switch (opcionalItem){
                case OptionalTypes::SALAMI{
                    $this->salami = true;
                    break;
                case OpcionalTypes::CHEDDAR 
                // etc etc etc
                }
            }
        }
    }
    }

}