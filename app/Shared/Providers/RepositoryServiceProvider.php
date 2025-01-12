<?php

namespace App\Shared\Providers;

//use App\ChallengeGroup\Repositories\ChallengeGroupEloquentRepository;
//use App\Shared\Domain\ChallengeGroup\Contracts\ChallengeGroupRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
//        $this->app->bind(ChallengeGroupRepository::class, ChallengeGroupEloquentRepository::class);
    }
}
