<?php

namespace App\Http\Responsables\Api\Ganancias;

use Illuminate\Contracts\Support\Responsable;

class ViewResponsable implements Responsable
{
    protected $_objeto;

    public function __construct()
    {
    }

    public function toResponse($request)
    {
        return $this->_vista($request);
    }

    private function _vista($request)
    {
        return view('layouts.app');
    }
}
