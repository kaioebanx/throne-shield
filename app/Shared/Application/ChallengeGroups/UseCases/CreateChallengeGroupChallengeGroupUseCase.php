<?php

namespace App\Shared\Application\ChallengeGroups\UseCases;

use App\Shared\Application\Auth\DTOs\UserDTO;
use App\Shared\Application\ChallengeGroups\DTOs\ChallengeGroupDTO;
use App\Shared\Domain\Auth\Entities\UserEntity;
use App\Shared\Domain\ChallengeGroup\Entities\ChallengeGroupEntity;

readonly class CreateChallengeGroupChallengeGroupUseCase extends ChallengeGroupUseCase
{
    public function execute(UserDTO $user_dto, ChallengeGroupDTO $challenge_group_dto): ChallengeGroupEntity
    {
        return $this->service->create(
            new UserEntity(...$user_dto),
            new ChallengeGroupEntity(...$challenge_group_dto)
        );
    }
}
