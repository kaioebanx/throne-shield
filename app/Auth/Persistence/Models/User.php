<?php

namespace App\Auth\Persistence\Models;

use Laravel\Passport\HasApiTokens;

class User extends BaseUser
{
    use HasApiTokens;
}
