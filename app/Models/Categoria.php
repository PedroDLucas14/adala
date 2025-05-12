<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre_categoria ',
        'activo',
        'created_at',
        'updated_at',
    ];
    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'categoria_id');
    }
    public function documentos()
    {
        return $this->hasMany(Documentos::class, 'categoria_id');
    }

}
