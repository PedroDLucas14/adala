<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
    protected $table = 'eventos';
    protected $fillable = [
        'nombre_evento',
        'descripcion',
        'fecha_inicio',
        'hora_inicio',
        'fecha_fin',
        'hora_fin',
        'participantes_maximos',
        'participantes_actuales',
        'activo',
        'cartel',
        'created_at',
        'updated_at',
    ];

    public function Cartel()
    {
        return $this->belongsTo(Imagen::class, 'cartel');
    }

    public function imagenes()
    {
        return $this->belongsToMany(Evento::class, 'imagenes_eventos', 'evento_id', 'imagen_id')
            ->withTimestamps();
    }
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'evento_usuario', 'evento_id', 'usuario_id')
            ->withTimestamps();
    }
}
