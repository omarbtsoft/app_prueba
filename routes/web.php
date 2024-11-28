<?php

use App\Http\Controllers\ContactoControllers;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoControllers;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::view("/app","productos", ["producto", "Es el prodcuto de Coca cola"]);

$listaProyecto=[
    "proyecto1 ",
    "proyecto2 ",
    "proyecto3 ",
    "proyecto4 "
];


$listaProyecto1=[
    ["titulo"=>"Mi proyecto1", "descripcion"=>"Este es mi proyecto 1 "],
    ["titulo"=>"Mi proyecto2", "descripcion"=>"Este es mi proyecto 2 "],
    ["titulo"=>"Mi proyecto3", "descripcion"=>"Este es mi proyecto 3 "]
];

Route::view("/home","home")->name("home");

Route::view("/about","about")->name("about");
//Route::view("/proyectos","proyectos", compact("listaProyecto1") )->name("proyectos");

Route::view("/contact","contacto")->name("contact");

//Route::get("/proyectos", 'ProyectoController' )->name("proyectos");

Route::resource('proyectos', ProyectoControllers::class)->names("proyect");

//Route::resource('proyectos', ProyectoControllers::class)->names("proyect")->middleware('auth');
/*
Route::get('/proyectos', [ProyectoControllers::class, 'index'])->name("proyect");
Route::get('/proyectos/crear', [ProyectoControllers::class, 'create'])->name("proyect.create");
Route::get('/proyectos/{proyecto}', [ProyectoControllers::class, 'show'])->name("proyect.show");
Route::get('/proyectos/{proyecto}/editar', [ProyectoControllers::class, 'edit'])->name("proyect.edit");
Route::post('/proyectos', [ProyectoControllers::class, 'store'])->name("proyect.store");
Route::patch('/proyectos/{proyecto}', [ProyectoControllers::class, 'update'])->name("proyect.update");
Route::delete('/proyectos/{proyecto}', [ProyectoControllers::class, 'destroy'])->name("proyect.destroy");
*/



Route::post('/contactos', [ContactoControllers::class, 'store'])->name("contactos_post");


//Route::resource('user', UserController::class);


Route::get('/', function () {
    return view('welcome');
});


Route::get("/hola", function () {
    return "Hola Como estas ";
});

Route::get("saludo/{nombre?}"  , function ($name="Omar") {
    return  "Hola ".$name;
});

// Rutas con nombres


Route::get("contacto", function () {
    return "Soy el contacto";
})->name("abc");

Route::get("test", function () {
    echo "<a href='".route("abc")."'> Contacto</a>";
    echo "<a href='".route("abc")."'> Contacto1</a>";
    echo "<a href='".route("abc")."'> Contacto2</a>";
});

Route::get("home1", function () {
    $title  ="Titulo de la pagina de Home";
    return view("home", ["title" =>$title]);
})->name("home");
require __DIR__.'/auth.php';
