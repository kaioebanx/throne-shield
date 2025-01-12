<?php

use App\ChallengeGroup\Http\Controllers\ChallengeGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('challenge-groups')->group(function () {
        Route::get('/',  [ChallengeGroupController::class, 'getAll']);
        Route::post('/',  [ChallengeGroupController::class, 'create']);
        Route::get('/{id}',  [ChallengeGroupController::class, 'getById']);
        Route::put('/{id}',  [ChallengeGroupController::class, 'update']);
        Route::delete('/{id}',  [ChallengeGroupController::class, 'delete']);
    });
});
