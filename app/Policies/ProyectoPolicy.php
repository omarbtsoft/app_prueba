<?php

namespace App\Policies;

use App\Models\Proyectos;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProyectoPolicy
{

    public function   before($user ,$ability) {
        if($user->role=="superAdmin"){
            return true;
        }
        // Para que  se este revisando a los  demas funciones
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Proyectos $proyectos): bool
    {
       return false ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role=="admin" ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Proyectos $proyectos): bool
    {
        return $user->role=="admin" ;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Proyectos $proyectos): bool
    {
    return $user->role=="admin" ;


    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Proyectos $proyectos): bool
    {
        return $user->role=="admin" ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Proyectos $proyectos): bool
    {
        return $user->role=="admin" ;
    }


    public function proyecto_delete_list(User $user){
        return $user->role=="admin" ;
    }


}
