<?php
namespace App\Repositorios;

use App\Models\User;

class Usuario {
    protected $columnas= ["id","name","email", "created_at", "updated_at", "role"];
     public function getUsuarios(){
        return User::select($this->columnas)->latest()->get();
     }
}
?>
