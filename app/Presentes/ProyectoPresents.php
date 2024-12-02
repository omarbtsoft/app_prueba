<?php


namespace App\Presentes;

class ProyectoPresents {


    public  $proyecto; 

    public function __construct($proyecto) {
        $this->proyecto = $proyecto; 
    }



    public function getTitulo() {
        return $this->proyecto->titulo; 
    }


}


?> 