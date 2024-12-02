<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\ProyectoPolicy;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    public function boot(): void
    {

        $this->registerPolicies();

        // Gate::define("crear-proyecto", function (User $user) {
        //     return $user->role=="admin";
        // });

        Gate::define('crear-proyecto', [ProyectoPolicy::class, 'create']);
        Gate::define('delete', [ProyectoPolicy::class,'delete']);
        Gate::define('admin', [ProyectoPolicy::class,'create']);
        Gate::define('restore', [ProyectoPolicy::class,'restore']);
        Gate::define('view-proyect-delete', [ProyectoPolicy::class,'proyecto_delete_list']);

    }

}
