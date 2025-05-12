<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Rules\ValidDni;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //TODO: Cambiar el nombre de los campos para que sean iguales a los de la base de datos y arreglar validaciones
        
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'apellido_1'=>['required', 'string', 'max:255'],
        //     'fecha_nac'=> ['required', 'date'],
        //     'telefono'=> ['required', 'string', 'max:9'],
        //     'direccion'=> ['required', 'string', 'max:255'],
        //     'localidad'=> ['required', 'string', 'max:255'],
        //     'provincia'=> ['required', 'string', 'max:255'],
        //     'codigo_postal'=> ['required', 'string', 'max:5'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'dni'=> ['required', 'string', 'max:9', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        // var_dump("aaa");
        // die;
        $user = User::create([
            'nombre' => $request->name,
            'apellido_1' => $request->apellido_1,
            'apellido_2' => $request->apellido_2,
            'fecha_nac' => $request->fecha_nac,
            'telefono_contacto' => $request->telefono_contacto,
            'direccion' => $request->direccion,
            'localidad' => $request->localidad,
            'provincia' => $request->provincia,
            'codigo_postal' => $request->codigo_postal,
            'dni' => $request->dni,
            'id_iamgen'=>null,
            'id_rol'=>2,
            'num_socio'=>2000,
            'nombre_usuario'=>$this->crearNombreUsuario($request->name, $request->apellido_1, $request->apellido_2,$request->dni),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function crearNombreUsuario($nombre, $apellido_1, $apellido_2,$dni): string
    {
        // Convertir a minúsculas y eliminar espacios
        $nombre = strtolower(str_replace(' ', '', $nombre));
        $apellido_1 = strtolower(str_replace(' ', '', $apellido_1));
        $apellido_2 = strtolower(str_replace(' ', '', $apellido_2));
        $dni = strtolower(str_replace(' ', '', $dni));
        // Obtener los primeros 2 caracteres del nombre
        $nombre = substr($nombre, 0, 3);
        // Obtener los primeros 3 caracteres del primer apellido
        $apellido_1 = substr($apellido_1, 0, 3);
        // Obtener los primeros 2 caracteres del segundo apellido
        if (!empty($apellido_2)) {
            $apellido_2 = substr($apellido_2, 0, 3);
        }
        // Obtener los últimos 3 dígitos del DNI
        $dni = substr($dni, -4);
        // Combinar los 3 partes
        $nombre_usuario = $nombre . $apellido_1 . $dni;

        return $nombre_usuario;
    }
}
