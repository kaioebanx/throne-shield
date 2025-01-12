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

    public function viewAll(User $user, ChallengeGroupCollection $challenge_groups): bool
    {
        return $challenge_groups->every(fn($challenge_group) => $user->id === $challenge_group->created_by);
    }

    public function update(User $user, ChallengeGroup $challenge_group): bool
    {
        return $user->id === $challenge_group->created_by;
    }

    public function delete(User $user, ChallengeGroup $challenge_group): bool
    {
        return $user->id === $challenge_group->created_by;
    }
}
