<?php

namespace App\Http\Controllers;

use App\Http\Services\FacturaService;
use App\Models\Compra;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //
    protected $service;

    public function __construct()
    {
        $this->service = new FacturaService;
    }

    public function index(){
        return $this->service->index();
    }

    public function CrearMasiva(){
        $bool = false;

        $bool = $this->service->CrearMasiva();
        //return $bool;
        if($bool){
            return view('pages.Facturas',[
                'registros' => $this->index()
            ]);
        }
    }

    public function ver(Factura $factura){
        // return $this->service->ver($factura);
        return view('pages.FacturasDetalle',[
            'factura' =>  $this->service->ver($factura)
        ]);
    }
}
