<?php

namespace App\Shared\Models\UniqueID;

use App\Auth\Persistence\Models\BaseUser;

class UuidUser extends BaseUser
{
    use HasUniqueID;

    // Remember, the users table should have:
    // $table->binary('id', 16)->primary();
    protected $casts = [
        'id' => UserUniqueID::class,
    ];
}
