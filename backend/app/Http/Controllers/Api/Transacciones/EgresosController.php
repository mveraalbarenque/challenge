<?php

namespace App\Http\Controllers\Api\Transacciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Responsables\Api\Egresos\ListarResponsable as Listar;
use App\Http\Responsables\Api\Egresos\BuscarResponsable as Buscar;
use App\Http\Responsables\Api\Egresos\RegistrarResponsable as Registrar;
use App\Http\Responsables\Api\Egresos\ActualizarResponsable as Actualizar;
use App\Http\Responsables\Api\Egresos\EliminarResponsable as Eliminar;

class EgresosController extends Controller
{
    public function index(Request $request)
    {
        return new Listar($request);
    }

    public function show(Request $request)
    {
        return new Buscar($request);
    }

    public function store(Request $request)
    {
        return new Registrar($request);
    }

    public function update(Request $request)
    {
        return new Actualizar($request);
    }

    public function destroy($id)
    {
        return new Eliminar($id);
    }
}
