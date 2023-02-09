<?php

namespace App\Enums;

enum TableStatus: string
{
    case Pending = 'pending';
    case Avalaiable = 'Avalaiable';
    case Unavaliable = 'unavaliable';
}
