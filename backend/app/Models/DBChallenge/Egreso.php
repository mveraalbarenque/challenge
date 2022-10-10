<?php

namespace App\Models\DBChallenge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DBChallenge\Configuracion as Model;

class Egreso extends Model
{
    use HasFactory;

    protected $table = 'tb_egresos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcion', 'monto', 'fecha'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    //C
    public static function _crear($request)
    {
        try {
            $objeto = Egreso::create($request->toArray());
            return $objeto;
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
    //R
    public static function _buscar($request)
    {
        try {
            return Egreso::where('id', $request->id)->get();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
    public static function _listar($request)
    {
        try {
            return Egreso::all();
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
    //U
    public static function _actualizar($objeto, $request)
    {
        try {
            $objeto->update($request->toArray());
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
    //D
    public static function _eliminar($id)
    {
        try {
            Egreso::destroy($id);
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
