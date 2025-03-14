@@ -0,0 +1,43 @@
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
        Schema::create('Talleres', function (Blueprint $table) {
            $table->string('Nombre')->primary();
            $table->string('Latitud')->nullable();
            $table->string('Longitud')->nullable();
            $table->string('Telefono');
            $table->string('Email');
            $table->string('Horario');
            $table->string('Rescate');
            $table->longText('Logo')->nullable();
            $table->timestamps();
        });

        DB::table('Talleres')->insert([
            'Nombre' => 'Taller de Prueba',
            'Latitud' => '19.4326',
            'Longitud' => '-99.1332',
            'Telefono' => '1234567890',
            'Email' => 'taller@gmail.com',
            'Horario' => 'Lunes a Viernes de 9:00 a 18:00',
            'Logo' => 'logo.png',
            'Rescate' => 'Sí',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Talleres');
    }
};