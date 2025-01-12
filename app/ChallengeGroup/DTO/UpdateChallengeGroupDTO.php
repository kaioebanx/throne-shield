<?php

namespace App\ChallengeGroup\DTO;


use App\Shared\DTO\DTO;

final readonly class UpdateChallengeGroupDTO extends DTO
{
    public function __construct(
        public int      $id,
        public ?string  $name = null,
        public ?string  $end_date = null,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'end_date' => $this->end_date,
        ];
    }
}
