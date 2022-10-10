<?php

namespace App\Http\Responsables\Api\Ingresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Ingreso as Modelo;

class BuscarResponsable implements Responsable
{
    protected $_objeto;

    public function __construct()
    {
    }

    public function toResponse($request)
    {
        return $this->_buscar($request);
    }

    private function _buscar($request)
    {
        $this->_objeto = Modelo::_buscar($request);
        if ($this->_objeto->count() == 0) {
            return $this->_busquedaErrada();
        }
        return $this->_busquedaExitosa($this->_objeto[0]);
    }

    private function _busquedaExitosa($data)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Ingreso Encontrado Exitosamente...!!!',
            'ingreso' => $data
        ], Response::HTTP_OK);
    }

    private function _busquedaErrada()
    {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Uuup, No se Pudo Encontrar el Ingreso en la DB :('
        ], Response::HTTP_NOT_FOUND);
    }
}
