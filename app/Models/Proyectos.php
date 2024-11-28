<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyectos extends Model
{
    use HasFactory;

    use SoftDeletes;


    protected $table= "proyectos";

    protected $fillable=["titulo","descripcion","slug", "categoria_id"];

     public function getRouteKeyName() {
        return "slug";
    }


    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }




}
