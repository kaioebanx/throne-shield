<?php

namespace App\ChallengeGroup\DTO;

use App\Shared\DTO\DTO;

final readonly class CreateChallengeGroupDTO extends DTO
{
    public function __construct(
        public string  $name,
        public string  $end_date,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'end_date' => $this->end_date,
        ];
    }
}
