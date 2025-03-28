<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Mecanicos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Contrasena');
            $table->string('Apellido');
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Taller')->nullable();
            $table->string('Especialidad')->nullable();
            $table->string('Experiencia')->nullable();
            $table->string('Disponibilidad')->nullable();
            $table->timestamps();
        });

        DB::table('Mecanicos')->insert([
            'Nombre' => 'Juan',
            'Contrasena' => '12345678',
            'Apellido' => 'Perez',
            'Telefono' => '12345678',
            'Email' => 'juanchotacorta@gmail.com',
            'Taller' => 'Taller-UTM',
            'Especialidad' => 'Mecanico-Electrico',
            'Experiencia' => '5 años',
            'Disponibilidad' => 'Lunes a Viernes'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mecanicos');
    }
};
