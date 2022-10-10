<?php

namespace App\Http\Responsables\Api\Egresos;

use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

use App\Models\DBChallenge\Egreso as Modelo;

class RegistrarResponsable implements Responsable
{
    protected $_objeto;

    public function __construct($request)
    {
        $this->_objeto = $request->toArray();
    }

    public function toResponse($request)
    {
        return $this->_registrar($request);
    }

    private function _registrar($request)
    {
        if (Modelo::_crear($request)) {
            return $this->_registroExitoso();
        }
        return $this->_registroErrado();
    }

    private function _registroExitoso()
    {
        return response()->json([
            'status' => Response::HTTP_CREATED,
            'message' => 'Felicidades el Registrado del Egreso fue Exitoso :)'
        ], Response::HTTP_CREATED);
    }

    private function _registroErrado()
    {
        return response()->json([
            'status' => Response::HTTP_FOUND,
            'message' => 'Uuup, No se Pudo Registrar el Egreso a la DB :('
        ], Response::HTTP_FOUND);
    }
}
