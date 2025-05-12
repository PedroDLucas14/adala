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
        Schema::create('evento_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            $table->foreign('evento_id')
                ->references('id')->on('eventos')
                ->onDelete('no action')
                ->onUpdate('cascade');
            $table->foreign('usuario_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento_user');
    }
};
