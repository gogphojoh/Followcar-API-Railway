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
        Schema::create('rescates', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('email')->primary();
            $table->date('fecha');
            $table->string('problema');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        DB::table('rescates')->insert([
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@gmail.com',
            'fecha' => '2025-03-02',
            'problema' => 'choque',
            'descripcion' => 'choque en la esquina de la calle',
            'estado' => 'pendiente',
            'latitud' => '19.4326',
            'longitud' => '-99.1332'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescates');
    }
};
