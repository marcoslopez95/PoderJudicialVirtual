<?php

namespace App\Http\Services;

use App\Http\Repository\ProductoRepository;
use Illuminate\Http\Request;

class ProductoService
{
    //
    protected $repository;
    public function __construct()
    {
        $this->repository = new ProductoRepository();
    }

    public function index(){
        return $this->repository->index();

    }

    public function Guardar($request){
        $request['precio_total'] = $request->precio_base * (1 + ($request->impuesto/100));
        //return $request;
        return $this->repository->Guardar($request);
    }

    public function editar($request, $producto){
        $request['precio_total'] = $request->precio_base * (1 + ($request->impuesto/100));
        return $this->repository->editar($request, $producto);
    }

    public function eliminar($producto){
        return $this->repository->eliminar($producto);
    }
}
