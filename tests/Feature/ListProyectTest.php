<?php

namespace Tests\Feature;

use App\Models\Proyectos;
use App\Models\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListProyectTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

       $user=  User::factory()->count(20)->create();
       dd($user->toArray()) ;




        // $this->withoutExceptionHandling();

        // $proyecto= Proyectos::create([
        //     "titulo"   =>"titulo test",
        //     "slug"=>"slug test",
        //     "descripcion"=>"descripcion test"
        // ]);



        // $response = $this->get(route('proyect.index'));

        // $response->assertStatus(200);

        // $response->assertViewIs('proyectos');


        // $response->assertSee($proyecto->slug);


    }
}
