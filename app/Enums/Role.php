<?php

namespace App\Enums;

enum Role:int
{
    case Admin = 1;
    case Supplier = 2;
    case Customer = 3;
    case Server =4;


    static function checkValue(int $role): bool
    {
        return in_array($role, self::getValues());

    }
    static function getValues(): array
    {
        return [
            self::Admin,
            self::Supplier,
            self::Customer,
            self::Server,
        ];
    }
}
