<?php

namespace App\Http\Responsables\Api\Ingresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Ingreso as Modelo;


class ActualizarResponsable implements Responsable
{
    protected $_objeto;
    public function __construct()
    {
    }

    public function toResponse($request)
    {
        return $this->_actualizar($request);
    }

    private function _actualizar($request)
    {
        $this->_objeto = Modelo::_buscar($request);
        if (count($this->_objeto) == 0) {
            return $this->_actualizacionErrada();
        }
        Modelo::_actualizar($this->_objeto[0], $request);
        return $this->_actualizacioExitosa();
    }

    private function _actualizacioExitosa()
    {
        return response()->json([
            'error' => Response::HTTP_ACCEPTED,
            'message' => 'Felicidades el Ingreso fue Actualizado con Exito :)',
        ], Response::HTTP_ACCEPTED);
    }

    private function _actualizacionErrada()
    {
        return response()->json([
            'error' => Response::HTTP_NOT_FOUND,
            'message' => 'Uuup, No se Pudo Actualizar el Ingreso en la DB :('
        ], Response::HTTP_NOT_FOUND);
    }
}
