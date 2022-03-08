<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre',20)->unique();
            $table->string('localizacion',40);
            $table->bigInteger('idempleadojefe')->unsigned()->nullable();
            
            $table->foreign('idempleadojefe')->references('id')->on('empleados');
            
            
        });
        
        //Altero tabla de empleados y creo fk de departamento
        Schema::table('empleados',function (Blueprint $table){
            $table->foreign('iddepartamento')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
