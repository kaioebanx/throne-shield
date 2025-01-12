<?php

namespace App\Auth\Persistence\Models;

use Laravel\Sanctum\HasApiTokens;

class ApiUser extends BaseUser
{
    use HasApiTokens;
}
