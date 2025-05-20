<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TablaCrud extends Component
{
    public $datos;
    public $cabeceras;
    public $campos;
    public $rutas;
    public $parametro;

    public function __construct($datos, $cabeceras, $campos, $rutas, $parametro='id')
    {
        $this->datos = $datos;
        $this->cabeceras = $cabeceras;
        $this->campos = $campos;
        $this->rutas = $rutas;
        $this->parametro = $parametro;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tabla-crud');
    }
}
