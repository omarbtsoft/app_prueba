<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Categoria $categor)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
    // return $categor->proyectos()->with("categoria")->latest()->paginate(5);
    //return $categoria->proyectos;
    $listaProyecto1 = $categoria->proyectos()->with("categoria")->latest()->paginate(3);

   // return view("proyectos", compact('listaProyecto1'));
   return view("proyectos",['listaProyecto1'=>$listaProyecto1, "categoria"=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
