<?php

namespace App\Models\DBChallenge;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //NOTA: DEFINI UNA CONFIGURACION POR SEPARADO, PENSANDO QUE EN UN FUTURO PORDRIA PRECISAR DBs Y/O MOTORES DISTINTOS

    protected $connection = 'db_challenge';
}
