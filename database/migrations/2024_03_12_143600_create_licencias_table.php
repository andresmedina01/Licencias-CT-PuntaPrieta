<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('tipo_licencia', ['LICENCIA EN VIVO', 'LICENCIA EN MUERTO', 'LICENCIA ESPECIAL']);

            $table->string('numero_licencia', 11)->unique()->nullable(false);
            $table->integer('unidad');

            $table->foreign('jefe_de_turno_id')->references('id')->on('jefes_de_turno');
            $table->unsignedBigInteger('jefe_de_turno_id');

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->unsignedBigInteger('empleado_id');

            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('centro_gestor')->nullable(false);

            $table->string('comentario_trabajo_realizar')->nullable(false);
            $table->string('comentario_especifico')->nullable(false);
            $table->string('energia_equipo')->nullable(false);

            $table->string('maniobrar')->nullable(false);
            $table->string('asegurar')->nullable(false);
            $table->string('bloquear')->nullable(false);

            $table->enum('status', ['NO LIBERADO', 'LIBERADO'])->default('NO LIBERADO');
            $table->string('usuario_que_libero_id')->nullable();
            $table->string('quien_libero')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licencias');
    }
};
