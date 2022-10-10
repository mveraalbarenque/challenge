<?php

namespace App\Http\Responsables\Api\Ganancias;

use Illuminate\Contracts\Support\Responsable;

use App\Models\DBChallenge\Ingreso;
use App\Models\DBChallenge\Egreso;


class DataResponsable implements Responsable
{
    protected $_data;
    protected $_ingresos;
    protected $_egresos;

    public function __construct($mes, $ano)
    {
        $this->_mes = $mes;
        $this->_ano = $ano;
    }
    public function toResponse($request)
    {
        return $this->_listar($this->_mes, $this->_ano);
    }

    private function _listar($mes, $ano)
    {
        $ingresos = $this->_getIngresos($mes, $ano);
        $egresos = $this->_getEgresos($mes, $ano);

        $this->_data['ingresos'] = $ingresos;
        $this->_data['egresos'] = $egresos;
        $this->_data['ganancias'] = $ingresos - $egresos;

        return $this->_data;
    }

    private function _getIngresos($mes, $ano)
    {
        $this->_ingresos = Ingreso::select('fecha', 'monto')->whereYear('fecha', $ano)->whereMonth('fecha', $mes)->get()->sum('monto');
        return $this->_ingresos;
    }

    private function _getEgresos($mes, $ano)
    {
        $this->_ingresos = Egreso::select('fecha', 'monto')->whereYear('fecha', $ano)->whereMonth('fecha', $mes)->get()->sum('monto');
        return $this->_ingresos;
    }
}
