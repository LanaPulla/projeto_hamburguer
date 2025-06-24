<?php

namespace App\Domain\Types;

use MabeEnum\Enum;

class MeatTypes extends Enum
{
    const MAMINHA  = 'Maminha';
    const ALCATRA  = 'Alcatra';
    const PICANHA  = 'Picanha';
    const VEGGIE   = 'Veggie Burger';
    
    static function toList()
    {
        return collect([
            self::MAMINHA   => 'Maminha',
            self::ALCATRA   => 'Alcatra',
            self::PICANHA   => 'Picanha',
            self::VEGGIE    => 'Veggie Burger',
        ]);
    }
}