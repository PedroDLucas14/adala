<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        'nombre',
        'nombre_usuario',
        'num_socio',
        'apellido_1',
        'apellido_2',
        'fecha_nac',
        'telefono_contacto',
        'direccion',
        'localidad',
        'provincia',
        'codigo_postal',
        'dni',
        'email',
        'remember_token',
        'id_imagen',
        'activo',
    ];

    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'id_imagen');
    }
    public function eventos()
    {
        return $this->belongsToMany(EventosAdala::class, 'eventos_adala_usuarios', 'usuario_id', 'evento_id')
            ->withTimestamps();
    }
}
