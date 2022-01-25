<?php

namespace App\Http\Controllers;

use App\Http\Services\CompraService;
use App\Models\Compra;
use Exception;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    //
    protected $service;
    public function __construct()
    {
        $this->service = new CompraService();
    }

    public function index(){
        return $this->service->index();
    }

    public function Crear(){
        return view('Compras.Crear');
    }

    public function Guardar(Request $request){
        $request->validate([
            'user_id' => 'required',
            'producto_id' => 'required',
        ]);

        $bool = false;
        try{
            $bool = $this->service->Guardar($request);
             //return $bool;
            if($bool){
                return view('pages.Compras',[
                    'registros' => Compra::all()
                ]);
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function ver(Compra $compras){
        return view('Compras.editar',['compras'=>$compras]);
    }

    public function editar(Request $request, Compra $compras){
        
        $bool = false;
        try{
            $bool = $this->service->editar($request,$compras);
            if($bool){
                return view('pages.Compras',[
                    'registros' => Compra::all()
                ]);
            }
        }catch(Exception $e){
            //return $bool = $this->service->Guardar($request);
        }
    }

    public function eliminar(Compra $compras){
        
        $bool = false;
        try{
            
            $bool = $this->service->eliminar($compras);
            
            
            if($bool){
                return view('pages.Compras',[
                    'registros' => Compra::where('deleted',false)->get()
                ]);
            }
        }catch(Exception $e){
            
            return $e->getMessage();
            //return $bool = $this->service->Guardar($request);
        }
    }
}
