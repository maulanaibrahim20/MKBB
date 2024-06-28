<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("admin", function ($user) {
            if (empty($user->role)) {
                return redirect("/logout");
            } else {
                return $user->role == 1;
            }
        });
        Gate::define("penjual", function ($user) {
            if (empty($user->customer->status == "penjual")) {
                return redirect("/logout");
            } else {
                return $user->role == 2;
            }
        });
        Gate::define("pembeli", function ($user) {
            if (empty($user->customer->status == "pembeli")) {
                return redirect("/logout");
            } else {
                return $user->role == 2;
            }
        });
    }
}
