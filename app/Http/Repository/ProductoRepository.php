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

    public function agregarQuitarStock($producto, $cantidad, $tipo){
        $producto = Producto::find($producto);
        if($tipo == 'quitar'){
            $producto->stock -= $cantidad;
        }
        if($tipo == 'agregar'){
            $producto->stock += $cantidad;
        }
        $producto->save();
        return $producto;
    }
}
