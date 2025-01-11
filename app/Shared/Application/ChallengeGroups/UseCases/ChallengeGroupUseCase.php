<?php

namespace App\Shared\Application\ChallengeGroups\UseCases;

use App\ChallengeGroup\Services\ChallengeGroupService;
use App\Shared\Application\Auth\DTOs\UserDTO;
use App\Shared\Application\ChallengeGroups\DTOs\ChallengeGroupDTO;
use App\Shared\Application\Shared\UseCase;
use App\Shared\Domain\ChallengeGroup\Entities\ChallengeGroupEntity;

abstract readonly class ChallengeGroupUseCase extends UseCase
{
    public function __construct(
        protected ChallengeGroupService $service
    ) {}

    public abstract function execute(UserDTO $user_dto, ChallengeGroupDTO $challenge_group_dto): ChallengeGroupEntity|bool;
}
