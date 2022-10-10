<?php

namespace App\Http\Controllers\Api\Transacciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Responsables\Api\Ganancias\ViewResponsable as View;
use App\Http\Responsables\Api\Ganancias\DataResponsable as Data;

class GananciasController extends Controller
{

    public function index(Request $request)
    {
        return new View($request);
    }

    public function listar($mes, $ano)
    {
        return new Data($mes, $ano);
    }
}
