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
        return view("usuarios.create", ["usuario"=>new User()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        //dd($request->validated());
        $newUsuario =new User($request->validated());
        $newUsuario->save();
        return redirect()->route("usuario.index")->with("success","Se  agrego un nuevo usuario");

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
        $this->authorize('update');
        //dd($usuario);
        return view("usuarios.edit",compact("usuario"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $usuario)
    {

        $this->authorize('update');
       //dd($request->only('name', 'email'));

//       dd($request->validated());

      //dd($request->validated());
      $usuario->update($request->validated());
      //$usuario->save();
    //     //dd($usuario);
         //return redirect()->back()->with("success","Se actualizo los datos de  usuario");
         return redirect()->route("usuario.index")->with("success", "Se actualizo el usuario");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {

        $this->authorize('delete');
        // Esto  se tiene que veriricar
        //dd($usuario->delete()));
        $usuario->delete();
        return redirect()->route("usuario.index")->with("success","Se elimino el usuario");

    }
}
