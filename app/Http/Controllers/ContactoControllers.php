<?php

namespace App\Http\Controllers;

use App\Mail\MessageRecived;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail as FacadesMail;

class ContactoControllers extends Controller
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
    public function store(Request $request)
    {
        //return Request("nombre");

        //request()->validate(["nombre"=>"required", "email"=>"required|email"]) ;
        $respuesta= request()->validate(["nombre"=>"required", "email"=>["required", "email"]], ["nombre.required"=>"Tu nombre no puede ser vacio"]) ;


        //FacadesMail::to("mamani.orc@gmail.com")->send(new MessageRecived($respuesta));
        FacadesMail::to("mamani.orc@gmail.com")->queue(new MessageRecived($respuesta));


        return back()->with("status","Tu mensaje fue enviado correctamente");

        //return new MessageRecived($respuesta);

        //return $request;

        //return $request->get('nombre');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
