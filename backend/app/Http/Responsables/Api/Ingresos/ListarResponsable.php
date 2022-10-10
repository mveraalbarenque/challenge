<?php

namespace App\Http\Responsables\Api\Ingresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Ingreso as Modelo;

class ListarResponsable implements Responsable
{
    protected $_listado;

    public function __construct()
    {
    }

    public function toResponse($request)
    {
        return $this->_listar($request);
    }

    private function _listar($request)
    {
        $listado = Modelo::_listar($request);
        if (count($listado) == 0) {
            return $this->_busquedaErrada();
        }
        return $this->_busquedaExitosa($listado);
    }

    private function _busquedaExitosa($listado)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Felicidades Ingresos Encontrados con Exitoso :)',
            'ingresos' => $listado
        ], Response::HTTP_OK);
    }

    private function _busquedaErrada()
    {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Uuup, se han Encontrado Ingresos en la DB :(',
        ], Response::HTTP_NOT_FOUND);
    }
}
