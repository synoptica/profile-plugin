<?php

namespace Synoptica\Profile\Models;

use Exception;
use Illuminate\Support\Collection;
use RainLab\User\Models\User as UserBase;

class User extends UserBase
{
    public $hasMany = [
        'profiles' => 'Synoptica\Profile\Models\Profile',
    ];

    public $hasOne = [
        'profile' => 'Synoptica\Profile\Models\Profile',
    ];

}