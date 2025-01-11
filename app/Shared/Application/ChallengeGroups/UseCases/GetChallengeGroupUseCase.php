<?php

namespace App\Shared\Application\ChallengeGroups\UseCases;

use App\Shared\Application\Auth\DTOs\UserDTO;
use App\Shared\Application\ChallengeGroups\DTOs\ChallengeGroupDTO;
use App\Shared\Domain\Auth\Entities\UserEntity;
use App\Shared\Domain\ChallengeGroup\Entities\ChallengeGroupEntity;
use App\Shared\Domain\Shared\Exceptions\DomainAuthorizationException;

readonly class GetChallengeGroupUseCase extends ChallengeGroupUseCase
{
    /**
     * @throws DomainAuthorizationException
     */
    public function execute(UserDTO $user_dto, ChallengeGroupDTO $challenge_group_dto): ChallengeGroupEntity
    {
        return $this->service->get(
            new UserEntity(...$user_dto),
            new ChallengeGroupEntity(...$challenge_group_dto)
        );
    }
}
