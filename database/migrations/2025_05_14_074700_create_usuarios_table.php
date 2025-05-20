<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_imagen')->nullable();
            $table->string('dni')->unique();
            $table->string('nombre_usuario');
            $table->integer('num_socio')->unique();
            $table->string('nombre');
            $table->string('apellido_1');
            $table->string('apellido_2');
            $table->string('email')->unique();
            $table->date('fecha_nac');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('provincia');
            $table->string('codigo_postal');
            $table->string('telefono_contacto');
            $table->tinyInteger('activo')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_imagen')
                ->references('id')->on('imagenes')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
        DB::table('usuarios')->insert([
            ['id_imagen' => null, 'dni' => '12345678A', 'nombre_usuario' => 'admin', 'num_socio' => '0001', 'nombre' => 'Admin', 'apellido_1' => 'Admin', 'apellido_2' => '', 'email' => 'espectrobro21@gmail.com', 'fecha_nac' => '2000-01-01', 'direccion' => 'Calle Admin', 'localidad' => 'Admin', 'provincia' => 'Admin', 'codigo_postal' => '00000', 'telefono_contacto' => '123456789', 'activo' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
