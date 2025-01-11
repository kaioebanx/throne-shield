<?php

namespace App\Shared\Application\Auth\DTOs;

use App\Shared\Application\Shared\DTO;

class UserDTO extends DTO
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $email,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
