<?php

namespace App\ChallengeGroup\Http\Controllers;

use App\ChallengeGroup\Http\Requests\CreateChallengeGroupRequest;
use App\ChallengeGroup\Http\Requests\UpdateChallengeGroupRequest;
use App\ChallengeGroup\Http\Resources\ChallengeGroupResource;
use App\ChallengeGroup\Persistence\Services\ChallengeGroupService;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class ChallengeGroupController extends Controller
{
    public function __construct(private readonly ChallengeGroupService $service) {}

    public function create(CreateChallengeGroupRequest $request): JsonResponse
    {
        $challenge_group = $this->service->create($request->toDTO());
        return response()->json(new ChallengeGroupResource($challenge_group), 201);
    }


    public function getAll(): JsonResponse
    {
        $challenge_group = $this->service->getAll();
        return response()->json(ChallengeGroupResource::collection($challenge_group));
    }

    /**
     * @throws AuthorizationException
     */
    public function getById(int $id): JsonResponse
    {
        $challenge_group = $this->service->getById($id);
        return response()->json(new ChallengeGroupResource($challenge_group));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdateChallengeGroupRequest $request): JsonResponse
    {
        $challenge_group = $this->service->update($request->toDTO());
        return response()->json(new ChallengeGroupResource($challenge_group));
    }

    /**
     * @throws AuthorizationException
     */
    public function delete(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(status: 204);
    }
}
