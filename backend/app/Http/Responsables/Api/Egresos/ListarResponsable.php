<?php

namespace App\Http\Responsables\Api\Egresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Egreso as Modelo;

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
            'message' => 'Felicidades Egresos Encontrados con Exitoso :)',
            'egresos' => $listado
        ], Response::HTTP_OK);
    }

    private function _busquedaErrada()
    {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Uuup, se han Encontrado Egresos en la DB :(',
        ], Response::HTTP_NOT_FOUND);
    }
}
