<?php

namespace App\Providers;

use App\Models\Auth\SanctumCache\PersonalAccessTokenWithCache;
use App\Repositories\PassportCache\ClientRepositoryWithCache;
use App\Repositories\PassportCache\RefreshTokenRepositoryWithCache;
use App\Repositories\PassportCache\TokenRepositoryWithCache;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Passport;
use Laravel\Passport\RefreshTokenRepository;
use Laravel\Passport\TokenRepository;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerPassportSingletons();
    }

    public function boot(): void
    {
        $this->configureCommands();
        $this->configureModels();
        $this->configureUrl();
        $this->configurePassport();
        $this->configureSanctum();
    }

    private function configureCommands(): void {
        DB::prohibitDestructiveCommands($this->app->isProduction());
    }

    private function configureModels(): void {
        Model::shouldBeStrict();
        Model::unguard();
    }

    private function configureUrl(): void {
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }

        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

//        RedirectIfAuthenticated::redirectUsing(function () {
//            return env('FRONTEND_URL');
//        });
    }

    private function configurePassport(): void {
        Passport::ignoreRoutes();
        Passport::hashClientSecrets();
        Passport::withCookieEncryption();
        Passport::withCookieSerialization();
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
        Passport::cookie(env('PASSPORT_COOKIE_NAME', 'auth_cookie'));
    }

    private function configureSanctum(): void {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessTokenWithCache::class);
    }

    private function registerPassportSingletons(): void {
        $this->app->singleton(TokenRepository::class, function () {
            return new TokenRepositoryWithCache();
        });

        $this->app->singleton(RefreshTokenRepository::class, function () {
            return new RefreshTokenRepositoryWithCache();
        });

        $this->app->singleton(ClientRepository::class, function () {
            return new ClientRepositoryWithCache();
        });
    }
}
