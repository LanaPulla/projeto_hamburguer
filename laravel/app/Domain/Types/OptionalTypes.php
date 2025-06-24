<?php

namespace App\Domain\Types;

use MabeEnum\Enum;

class OptionalTypes extends Enum
{
    const SALAMI    = 'Salame';
    const CHEDDAR   = 'Cheddar';
    const RED       = 'Cebola Roxa';
    const BACON     = 'Bacon';
    const TOMATO    = 'Tomate';
    const CUCUMBER  = 'Pepino';

    static function toList()
    {
        return collect([
            self::SALAMI    => 'Salame',
            self::CHEDDAR   => 'Cheddar',
            self::RED       => 'Cebola Roxa',
            self::BACON     => 'Bacon',
            self::TOMATO    => 'Tomate',
            self::CUCUMBER  => 'Pepino',
        ]);
    }
}
