<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'nombre',
        'activo',
        'created_at',
        'updated_at',
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'rol_id');
    }
}
