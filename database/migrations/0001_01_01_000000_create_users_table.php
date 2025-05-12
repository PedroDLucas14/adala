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
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rol')->default(2);
            $table->unsignedBigInteger('id_imagen')->nullable();
            $table->string('dni')->unique();
            $table->string('nombre_usuario');
            $table->string('num_socio')->unique();
            $table->string('nombre');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('fecha_nac');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal');
            $table->string('telefono_contacto');
            $table->tinyInteger('activo')->default(1);
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_rol')
                ->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('id_imagen')
                ->references('id')->on('imagenes')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('roles');
    }
};
