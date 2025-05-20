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
        
        Schema::create('eventos_adala', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->text('descripcion');
            $table->date('fecha_inicio');
            $table->date('hora_inicio');
            $table->date('fecha_fin')->nullable();
            $table->date('hora_fin')->nullable();
            $table->integer('participantes_maximos');
            $table->integer('participantes_actuales')->default(0);
            $table->unsignedBigInteger('cartel')->nullable();
            $table->foreign('cartel')
                ->references('id')->on('imagenes')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->tinyInteger('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_adala');
    }
};
