<?php

namespace App\Http\Repository;

use App\Models\Compra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraRepository
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        if(Auth::user()->tipo_usuario != 1){
            return Compra::addSelect([
                'nombre_user' => User::select('name')->whereColumn('user_id','users.id')
            ])
            ->where('user_id',Auth::user()->id)
            ->get();    
        }
        return Compra::addSelect([
                        'nombre_user' => User::select('name')->whereColumn('user_id','users.id')
                    ])
                    ->get();
    }

    public function Guardar($request){
        return Compra::create($request->all());
    }

    public function editar($request, $producto){
        return $producto->update($request->all());
    }

    public function eliminar($compra){
        
        return $compra->delete();
    }
}
