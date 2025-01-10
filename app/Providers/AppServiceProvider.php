<?php

namespace App\Providers;

use App\Models\Program;
use App\Models\Review;
use App\Models\Thread;
use App\Models\User;
use App\Policies\ProgramPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\UserManagementPolicy;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        Gate::policy(User::class, UserManagementPolicy::class);
        Gate::policy(Program::class, ProgramPolicy::class);
        Gate::policy(Review::class, ReviewPolicy::class);
        Gate::policy(Thread::class, ThreadPolicy::class);
    }
}
