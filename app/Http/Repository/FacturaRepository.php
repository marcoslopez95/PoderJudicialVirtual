<?php

namespace App\Http\Repository;

use App\Models\Compra;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaRepository
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        if(Auth::user()->tipo_usuario != 1 ){
            return Factura::addSelect([
                'nombre_user' => User::select('name')->whereColumn('user_id','users.id')
            ])
            ->where('user_id',Auth::user()->id)
            ->get();    
        }
        return Factura::addSelect([
            'nombre_user' => User::select('name')->whereColumn('user_id','users.id')
        ])->get();
    }

    public function CrearMasiva(){
        $compras = Compra::whereNull('factura_id')->get();
        
        return $compras;
    }

    public function Guardar($datos){
        return Factura::create($datos);
    }

    public function ver($factura){
        $factura->load('Compras.Productos');   
        $user_name = User::select('name')->find($factura->user_id);
        $factura->nombre_user = $user_name->name;
        return $factura;   
    }

}
