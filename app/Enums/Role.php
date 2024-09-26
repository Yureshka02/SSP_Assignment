<?php

namespace App\Enums;

enum Role:int
{
    case Admin = 1;
    case Supplier = 2;
    case Customer = 3;
    case Server =4;
}
