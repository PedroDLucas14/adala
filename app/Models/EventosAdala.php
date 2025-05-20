<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class EventosAdala extends Model
{
    protected $table = 'eventos_adala';
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

    public function cartelEvento()
    {
        return $this->belongsTo(Imagen::class, 'cartel');
    }

    public function imagenes()
    {
        return $this->belongsToMany(EventosAdala::class, 'imagenes_eventos_adala', 'evento_id', 'imagen_id')
            ->withTimestamps();
    }
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'eventos_adala_usuarios', 'evento_id', 'usuario_id')
            ->withTimestamps();
    }
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
