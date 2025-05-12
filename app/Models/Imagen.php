<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //
    protected $table = 'imagenes';

    protected $fillable = [
        'nombre',
        'categoria_id',
        'nombre_imagen',
        'ruta',
        'created_at',
        'updated_at',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function cartel()
    {
        return $this->hasMany(Evento::class, 'cartel');
    }

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'imagenes_eventos', 'imagen_id', 'evento_id')
            ->withTimestamps();
    }
}
