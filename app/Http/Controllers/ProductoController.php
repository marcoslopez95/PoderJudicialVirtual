<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductoService;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    protected $service;
    public function __construct()
    {
        $this->service = new ProductoService();
    }

    public function index(){
        return $this->service->index();
    }

    public function Crear(){
        return view('Productos.Crear');
    }

    public function Guardar(Request $request){
        $request->validate([
            'nombre' => 'required|alpha',
            'precio_base' => 'required|numeric|min:0.01|between:0,1000000000',
            'precio_venta' => 'required|numeric|min:0.01|between:0,1000000000',
            //'impuesto' => 'required|numeric|min:0.01|between:0,100',
        ]);

        $bool = false;
        try{
            $bool = $this->service->Guardar($request);
            if($bool){
                return view('pages.Productos',[
                    'registros' => Producto::all()
                ]);
            }
        }catch(Exception $e){
            return $bool = $this->service->Guardar($request);
        }
    }

    public function ver(Producto $producto){
        return view('Productos.editar',['producto'=>$producto]);
    }

    public function editar(Request $request, Producto $producto){
        $request->validate([
            'nombre' => 'required|alpha',
            'precio_base' => 'required|numeric|min:0.01|between:0,1000000000',
            'precio_venta' => 'required|numeric|min:0.01|between:0,1000000000',
            //'impuesto' => 'required|numeric|min:0.01|between:0,100',
        ]);
        $bool = false;
        try{
            $bool = $this->service->editar($request,$producto);
            if($bool){
                return view('pages.Productos',[
                    'registros' => Producto::all()
                ]);
            }
        }catch(Exception $e){
            //return $bool = $this->service->Guardar($request);
        }
    }

    public function eliminar(Producto $producto){
        
        $bool = false;
        try{
            $bool = $this->service->eliminar($producto);
            //return $bool;
            if($bool){
                return view('pages.Productos',[
                    'registros' => Producto::all()
                ]);
            }
        }catch(Exception $e){
            //return $bool = $this->service->Guardar($request);
        }
    }

    public function buscar(Request $request){
        return Producto::when($request->nombre,function($query,$nombre){
            return $query->where('nombre','like',"%$nombre%");
        })->get();
    }
}
