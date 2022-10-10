<?php

namespace App\Http\Responsables\Api\Ingresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Ingreso as Modelo;

class EliminarResponsable implements Responsable
{
    protected $_objeto;
    protected $_id;

    public function __construct($id)
    {
        $this->_id = $id;
    }

    public function toResponse($request)
    {
        return $this->_eliminarTransaccion();
    }

    private function getObjeto($id)
    {
        $this->_objeto = Modelo::find($id);
        return $this->_objeto;
    }

    private function _eliminarTransaccion()
    {
        if (!$this->getObjeto($this->_id)) {
            return $this->_eliminacionErrada();
        }
        Modelo::_eliminar($this->_id);
        return $this->_eliminacionExitosa();
    }

    private function _eliminacionExitosa()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Felicidades el Ingreso fue Eliminado con Exito :)',
        ], Response::HTTP_OK);
    }

    private function _eliminacionErrada()
    {
        return response()->json([
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Uuup, No se Pudo Eliminar el Ingreso en la DB :('
        ], Response::HTTP_NOT_FOUND);
    }
}
