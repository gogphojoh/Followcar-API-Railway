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
        Schema::create('Inventarios', function (Blueprint $table) {
            $table->string('Nombre')->primary();
            $table->string('Descripcion');
            $table->integer('Cantidad');
            $table->decimal('Precio', 8, 2);
            $table->string('Categoria');
            $table->string('Proveedor');
            $table->timestamps();
        });

        DB::table('Inventarios')->insert([
            'Nombre' => 'Producto 1',
            'Descripcion' => 'Descripcion 1',
            'Cantidad' => 10,
            'Precio' => 100.00,
            'Categoria' => 'Balatas',
            'Proveedor' => 'Proveedor 1',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Inventarios');
    }
};
