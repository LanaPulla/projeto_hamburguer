<?php

namespace App\Domain\Types;

use MabeEnum\Enum;

class OptionalTypes extends Enum
{
    const SALAMI= 'salami';
    const CHEDDAR= 'cheddar';
    const RED= 'red_onion';
    const BACON= 'bacon';
    const TOMATO= 'tomato';
    const CUCUMBER= 'cucumber';

    static function toList()
    {
        return collect([
            self::SALAMI    => 'Salame',
            self::CHEDDAR  => 'Cheddar',
            self::RED => 'Cebola Roxa',
            self::BACON     => 'Bacon',
            self::TOMATO   => 'Tomate',
            self::CUCUMBER => 'Pepino',
        ]);
    }
}
