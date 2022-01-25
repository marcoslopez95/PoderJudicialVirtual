<?php

namespace App\Http\Services;

use App\Http\Repository\FacturaRepository;
use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FacturaService
{
    //
    protected $repository;
    public function __construct()
    {
        $this->repository = new FacturaRepository();
    }

    public function index(){
        return $this->repository->index();
    }

    public function CrearMasiva(){
        $compras = $this->repository->CrearMasiva();
        $compras = $compras->groupBy('user_id');
        $facturas = [];
        if(count($compras)== 0){
            return true;
        }
        foreach($compras as $user=>$compras){
            $cont = false;
            $datos = [
                'user_id' => $user,
                'fecha' => Carbon::now(),
                'base' => $compras->sum('base'),
                'impuestos' => $compras->sum('impuestos'),
                'total' => $compras->sum('total')
            ];
            $cont = $this->repository->Guardar($datos);
            foreach($compras as $compra){
                $update_compra = Compra::find($compra->id);
                $update_compra->factura_id = $cont->id;
                $update_compra->save();
            }
            
            $facturas[] = $cont;
        }
        return $facturas;
    }

    public function ver($factura){
        return $this->repository->ver($factura);
    }
}
