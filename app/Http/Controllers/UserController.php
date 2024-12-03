<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories;
use App\Repositorios\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $usuario;
   function __construct(Usuario $user){
    $this->usuario = $user;
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lista_usuarios= $this->usuario->getUsuarios();
        //$lista_usuarios= User::select("name","email", "created_at", "updated_at")->get();
        return view("usuarios.index",compact("lista_usuarios"));
        //dd($lista_usuario);
        //$lista_user =$this->usuario->getUsers(12);
        //dd($lista_user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(UserController $userController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $usuario)
    {
        //dd($usuario);
        return view("usuarios.edit",compact("usuario"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        // $usuario->update($request->all());
       $usuario->name=$request->name;
       $usuario->email=$request->email;
       $usuario->save();
        //dd($usuario);
        return redirect()->back()->with("success","Se actualizo los datos de  usuario");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        return $usuario;
    }
}
