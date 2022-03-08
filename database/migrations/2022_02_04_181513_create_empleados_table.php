<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',20);
            $table->string('apellidos',40);
            $table->string('email',40)->unique();
            $table->bigInteger('telefono')->unsigned()->unique();
            $table->date('alta');
            $table->bigInteger('idpuesto')->unsigned()->nullable();
            $table->bigInteger('iddepartamento')->unsigned()->nullable();
            
            $table->foreign('idpuesto')->references('id')->on('puestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
