<?php

namespace App\Shared\Http\Requests;

use App\Shared\DTO\DTO;

interface ConvertsToDTO
{
    public function toDTO(): DTO;
}
