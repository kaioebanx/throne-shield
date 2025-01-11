<?php

namespace App\ChallengeGroup\Http\Controllers;

use App\ChallengeGroup\Http\Requests\CreateChallengeGroupRequest;
use App\ChallengeGroup\Http\Requests\UpdateChallengeGroupRequest;
use App\ChallengeGroup\Http\Resources\ChallengeGroupResource;
use App\Shared\Application\ChallengeGroups\DTOs\ChallengeGroupDTO;
use App\Shared\Application\ChallengeGroups\UseCases\CreateChallengeGroupChallengeGroupUseCase;
use App\Shared\Application\ChallengeGroups\UseCases\DeleteChallengeGroupUseCase;
use App\Shared\Application\ChallengeGroups\UseCases\GetChallengeGroupUseCase;
use App\Shared\Application\ChallengeGroups\UseCases\UpdateChallengeGroupUseCase;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ChallengeGroupController extends Controller
{
    public function create(CreateChallengeGroupRequest $request, CreateChallengeGroupChallengeGroupUseCase $use_case): JsonResponse
    {
        $challenge_group = $use_case->execute(auth()->user()->toDTO(), $request->toDTO());
        return (new ChallengeGroupResource($challenge_group))
            ->response()
            ->setStatusCode(201);
    }

    public function get(int $id, GetChallengeGroupUseCase $use_case): JsonResponse
    {
        $challenge_group = $use_case->execute(auth()->user()->toDTO(), new ChallengeGroupDTO($id));
        return (new ChallengeGroupResource($challenge_group))
            ->response()
            ->setStatusCode(200);
    }

    public function update(UpdateChallengeGroupRequest $request, int $id, UpdateChallengeGroupUseCase $use_case): JsonResponse
    {
        $challenge_group = $use_case->execute(auth()->user()->toDTO(), $request->toDto());
        return (new ChallengeGroupResource($challenge_group))
            ->response()
            ->setStatusCode(200);
    }

    public function delete(int $id, DeleteChallengeGroupUseCase $use_case): JsonResponse
    {
        $use_case->execute(auth()->user()->toDTO(), new ChallengeGroupDTO($id));
        return response()->json()->setStatusCode(200);
    }
}
