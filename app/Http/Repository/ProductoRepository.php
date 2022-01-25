<?php

namespace App\Http\Repository;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoRepository
{
    //
    public function __construct()
    {
        
    }

    public function index(){
        return Producto::all();
    }

    public function Guardar($request){
        return Producto::create($request->all());
    }

    public function editar($request, $producto){
        return $producto->update($request->all());
    }

    public function eliminar($producto){
        return $producto->delete();
    }
}
