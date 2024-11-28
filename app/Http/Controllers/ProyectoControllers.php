<?php

namespace App\Http\Controllers;

use App\Events\ProyectSaved;
use App\Http\Requests\CreateProyectRequest;
use App\Models\Categoria;
use App\Models\Proyectos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProyectoControllers extends Controller
{

    function __construct()
    {
        $this->middleware("auth")->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  lista recursos
        $listaProyecto1 = [
            ["titulo" => "Mi proyecto1", "descripcion" => "Este es mi proyecto 1 "],
            ["titulo" => "Mi proyecto2", "descripcion" => "Este es mi proyecto 2 "],
            ["titulo" => "Mi proyecto3", "descripcion" => "Este es mi proyecto 3 "]
        ];

        //$listaProyecto1= DB::table("proyectos")->get();
        $listaProyecto1 = DB::table("proyectos")->orderBy('created_at', 'desc')->paginate(5);
        foreach ($listaProyecto1 as $proyecto) {
            // Agregar la diferencia de tiempo en formato relativo
            $proyecto->tiempo_relativo = Carbon::parse($proyecto->created_at)->diffForHumans();
        }

        return view("proyectos", compact("listaProyecto1"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("proyectos.create", ["categorias"=> Categoria::pluck('nombre', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProyectRequest $request)
    {


        //dd(request());

        //$file_url=  request()->file('image')->store('imagenes', 'public');
        $file_url =  request()->file('image')->store('imagenes'); // Se tiene que configurar lo que  es el disco duro o seq se tiene que hacer la referencia en file sistem o en .env

        $titulo = request("titulo");
        $slug = request("slug");
        $descipcion = request("descripcion");

        //Proyectos::create(["titulo"=>$titulo, "descripcion"=>$descipcion, "slug"=>$slug]);
        //Proyectos::create($request->all());
        //return $request->only('titulo', 'slug', 'descripcion');

        $fields = request()->validate([
            "titulo" => "required",
            "slug" => "required",
            "descripcion" => "required",
        ]);



        //return $request->validated();
        //return Proyectos::create($request->only('titulo', 'slug', 'descripcion'));
        //Proyectos::create($fields);
        //$proyecto=Proyectos::create($request->validated());
        $proyecto = new Proyectos($request->validated());
        $proyecto->image = $file_url;
        $proyecto->save();

        ProyectSaved::dispatch($proyecto);

        return Redirect::route("proyect.index")->with("success", "Se a creado la Proyecto");
        //    return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyectos $proyecto)
    {

        //return $id ;
        //$proyecto= Proyectos::findOrFail($id);
        return view("proyectos.show", ["proyecto" => $proyecto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyectos $proyecto)
    {

        //return Categoria::pluck('nombre', 'id');
        return view("proyectos.edit", ["proyecto" => $proyecto, "categorias"=> Categoria::pluck('nombre', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Proyectos $proyecto, CreateProyectRequest $request)
    {
        /*      $proyecto->update([
            "titulo"=> request("titulo"),
            "slug"=> request("slug"),
            "descripcion"=> request("descripcion")
        ]);

*/


        if ($request->hasFile("image")) {
            if($proyecto->image){
                Storage::delete($proyecto->image);
            }
            $proyecto->fill($request->validated());

            $file_url=  request()->file('image')->store('imagenes');// Se tiene que configurar lo que  es el disco duro o seq se tiene que hacer la referencia en file sistem o en .env
            $proyecto->image=$file_url;

            $proyecto->save();

            // $image = Image::make(Storage::get($proyecto->image));
            // $image->widen(600)->encode();
            // Storage::put($proyecto->image, $image);

            ProyectSaved::dispatch($proyecto);


        } else {
            $proyecto->update(array_filter($request->validated()));
        }
        //return dd(array_filter($request->validated()));

        //$proyecto->update($request->validated());

        return Redirect::route("proyect.show", $proyecto)->with('status', 'Se actualizo el proyecto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyectos $proyecto)
    {
        //return $proyecto;
        $proyecto->delete();
        return Redirect::route("proyect.index")->with('status', 'Se elimino  el proyecto');
    }
}