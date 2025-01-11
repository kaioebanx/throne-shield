<?php

namespace App\Shared\Http\Requests;

use App\Shared\Application\Shared\DTO;

interface ConvertsToDTO
{
    public function toDTO(): DTO;
}
