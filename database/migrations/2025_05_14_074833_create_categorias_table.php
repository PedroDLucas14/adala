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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_categoria')->unique();
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();
        });

        DB::table('categorias')->insert([
            ['nombre_categoria' => 'DOCUMENTACION_ADALA', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'PERFILES', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'EVENTOS', 'created_at' => now(), 'updated_at' => now()],
            ['nombre_categoria' => 'CARTELES_EVENTOS', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
