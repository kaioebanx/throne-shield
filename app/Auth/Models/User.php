<?php

namespace App\Auth\Models;

use Laravel\Passport\HasApiTokens;

class User extends BaseUser
{
    use HasApiTokens;
}
