<?php

namespace App\ChallengeGroup\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChallengeGroupNotFoundException extends Exception
{
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'Challenge group not found.'
        ], Response::HTTP_NOT_FOUND);
    }
}
