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
        Schema::disableForeignKeyConstraints();
        Schema::create('documentos', function (Blueprint $table) {
            $table->id(); // Clave primaria 'id'
            $table->unsignedBigInteger('categoria_id');
            $table->string('nombre_documento');
            $table->string('ruta');
            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
