<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->nullable()->after('id');

             $table->foreign('categoria_id')->references('id')->on('categorias')
             ->onUpdate('cascade')
             ->onDelete('set null');
             ;

         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        proyectos_categoria_id_foreign

Schema::table('proyectos', function (Blueprint $table) {
//    $table->unsignedBigInteger('categoria_id')->nullable()->after('id');
    $table->dropForeign('proyectos_categoria_id_foreign');
    $table->dropColumn('categoria_id');

 });


        Schema::dropIfExists('categorias');
    }
};
