<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        /*
        $listaProyecto1 = [
            ["titulo" => "Mi proyecto1", "descripcion" => "Este es mi proyecto 1 "],
            ["titulo" => "Mi proyecto2", "descripcion" => "Este es mi proyecto 2 "],
            ["titulo" => "Mi proyecto3", "descripcion" => "Este es mi proyecto 3 "]
        ];
        */

        //$listaProyecto1 = DB::table("proyectos")->get();
        //$listaProyecto1 =Proyectos::get();
        $listaProyecto1 =Proyectos::paginate(1);

        return view("proyectos", compact("listaProyecto1"));
    }
}
