<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }
    public function create()
    {

        return view('usuarios.create');
    }
    public function store(Request $request) {}

    public function show($id)
    {
        return view('usuarios.show', compact('id'));
    }

    public function edit($id)
    {
        return view('usuarios.edit', compact('id'));
    }

    public function update(Request $request, $id) {}
    public function destroy($id)
    {
        return view('usuarios.destroy', compact('id'));
    }
}
