<?php

namespace App\ChallengeGroup\Persistence\Services;

use App\ChallengeGroup\DTO\CreateChallengeGroupDTO;
use App\ChallengeGroup\DTO\UpdateChallengeGroupDTO;
use App\ChallengeGroup\Persistence\Models\ChallengeGroup;
use App\ChallengeGroup\Persistence\Models\ChallengeGroupCollection;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final readonly class ChallengeGroupService
{
    use AuthorizesRequests;

    public function create(CreateChallengeGroupDTO $challenge_group_dto): ChallengeGroup
    {
        return ChallengeGroup::create([
            'name' => $challenge_group_dto->name,
            'end_date' => $challenge_group_dto->end_date,
            'created_by' => auth()->id(),
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function getById(int $id): ChallengeGroup
    {
        $challenge_group = ChallengeGroup::with('competitors')->findOrFail($id);
        $this->authorize('update', $challenge_group);
        return $challenge_group;
    }

    public function getAll(): ChallengeGroupCollection
    {
        return ChallengeGroup::where([
            'created_by' => auth()->id(),
        ])->get();
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateChallengeGroupDTO $challenge_group_dto): ChallengeGroup
    {
        $challenge_group = ChallengeGroup::where([
            'id' => $challenge_group_dto->id,
            'created_by' => auth()->id(),
        ])->firstOrFail();
        $this->authorize('update', $challenge_group);
        $challenge_group->update(array_filter($challenge_group_dto->toArray(), fn($value) => !is_null($value)));
        return $challenge_group;
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(int $id): void
    {
        $challenge_group = ChallengeGroup::where([
            'id' => $id,
            'created_by' => auth()->id(),
        ])->firstOrFail();
        $this->authorize('delete', $challenge_group);
        $challenge_group->delete();
    }
}
