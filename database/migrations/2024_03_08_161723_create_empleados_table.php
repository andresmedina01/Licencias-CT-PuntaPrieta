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
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable(false);
            $table->string('rpe')->nullable(false)->unique();
            $table->string('correo')->nullable()->unique();
            $table->unsignedBigInteger('departamentos_id');
            $table->foreign('departamentos_id')->references('id')->on('departamentos');
            $table->string('puesto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
