<?php

namespace App\Http\Services;

use App\Http\Repository\ProductoRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        if(!array_key_exists('impuesto',$request->all())){
            $request['impuesto'] = 0;
        }
        $request['precio_total'] = $request->precio_base * (1 + ($request->impuesto/100));
        //return $request;
        return $this->repository->Guardar($request);
    }

    public function editar($request, $producto){
        if(!$request->has('impuesto')){
            $request['impuesto'] = 0;
        }
        $request['precio_total'] = $request->precio_base * (1 + ($request->impuesto/100));
        return $this->repository->editar($request, $producto);
    }

    public function eliminar($producto){
        return $this->repository->eliminar($producto);
    }

    public function agregarQuitarStock($id, $request){
        try {
            return $this->repository->agregarQuitarStock($id,$request->cantidad,$request->tipo);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return null;
        }
    }
}
