<?php

namespace App\Providers;

use App\Models\Program;
use App\Models\User;
use App\Policies\ProgramPolicy;
use App\Policies\UserManagementPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserManagementPolicy::class);
        Gate::policy(Program::class, ProgramPolicy::class);
    }
}
