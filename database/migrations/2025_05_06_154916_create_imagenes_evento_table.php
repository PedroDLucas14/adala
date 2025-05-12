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
    {Schema::disableForeignKeyConstraints();
        Schema::create('imagenes_evento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('imagen_id');
            $table->foreign('evento_id')
                ->references('id')->on('eventos')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('imagen_id')
                ->references('id')->on('imagenes')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_evento');
    }
};
