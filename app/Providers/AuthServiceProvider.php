<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\ProyectoPolicy;
//use Illuminate\Auth\Access\Gate;
use App\Policies\UserPolicy;
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
       User::class => UserPolicy::class
    ];

    public function boot(): void
    {

        $this->registerPolicies();

        // Gate::define("crear-proyecto", function (User $user) {
        //     return $user->role=="admin";
        // });

        // Ya no es necesario cuando  se hace al enganche con el modelo y la politica   ya no se va usar Gate('dato'), ya en can('dato', modelo), entonces el dato es un metodo en  policy , Create , etc
        // Si se quiere  protejer acciones no que este relacionado con los modelos entonces se puede usar GATES ,  y si es que este relacionado con el modelo entonces Policy

        Gate::define('crear-proyecto', [ProyectoPolicy::class, 'create']);
        Gate::define('delete', [ProyectoPolicy::class,'delete']);
        Gate::define('admin', [ProyectoPolicy::class,'create']);
        Gate::define('restore', [ProyectoPolicy::class,'restore']);
        Gate::define('view-proyect-delete', [ProyectoPolicy::class,'proyecto_delete_list']);

    }


}
