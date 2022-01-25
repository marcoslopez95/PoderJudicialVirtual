<?php

namespace App\Http\Services;

use App\Http\Repository\CompraRepository;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraService
{
    //
    protected $repository;
    public function __construct()
    {
        $this->repository = new CompraRepository();
    }

    public function index(){
        return $this->repository->index();

    }

    public function Guardar($request){
        $request['fecha_compra'] = Carbon::now();
        $acum_base = $acum_impuesto = $acum_total = 0;

        $productos = Producto::find($request->producto_id);
        $acum_base = $productos->sum('precio_base');
        $acum_total = $productos->sum('precio_total');

        foreach ($productos as $producto) {
            $acum_impuesto += $producto->precio_base * ($producto->impuesto/100);
        }

        $request['base'] = $acum_base;
        $request['impuestos'] = $acum_impuesto;
        $request['total'] = $acum_total;
        
        $compra = $this->repository->Guardar($request);
        foreach($request->producto_id as $id_prod){
            $prod = Producto::find($id_prod);
            DB::table('compra_producto')->insertGetId([
              'compra_id' => $compra->id,
              'producto_id' => $id_prod,
              'impuesto' => $prod->impuesto,
              'base'=> $prod->precio_base,
              'total'=> $prod->precio_total,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
            ]);
        }
        return $compra;
    }

    public function editar($request, $producto){
        $request['precio_total'] = $request->precio_base * (1 + ($request->impuesto/100));
        return $this->repository->editar($request, $producto);
    }

    public function eliminar($compra){
        
        return $this->repository->eliminar($compra);
    }
}
