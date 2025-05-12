<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'nombre_usuario',
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
        'email_verified_at',
        'password',
        'remember_token',
        'id_rol',
        'id_imagen',
        'activo',
        'num_socio'
    ];
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'id_imagen');
    }
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_usuario', 'usuario_id', 'evento_id')
            ->withTimestamps();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
