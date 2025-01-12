<?php

namespace App\ChallengeGroup\Persistence\Policies;

use App\Auth\Persistence\Models\User;
use App\ChallengeGroup\Persistence\Models\ChallengeGroup;
use App\ChallengeGroup\Persistence\Models\ChallengeGroupCollection;

class ChallengeGroupPolicy
{
    public function view(User $user, ChallengeGroup $challenge_group): bool
    {
        return
            $user->id === $challenge_group->created_by ||
            $challenge_group->competitors->contains('user_id', $user->id);
    }
}
