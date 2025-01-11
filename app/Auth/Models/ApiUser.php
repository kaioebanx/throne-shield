<?php

namespace App\Auth\Models;

use Laravel\Sanctum\HasApiTokens;

class ApiUser extends BaseUser
{
    use HasApiTokens;
}
