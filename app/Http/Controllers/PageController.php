<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $producto;
    protected $compra;
    protected $factura;
    public function __construct()
    {
        $this->producto = new ProductoController();
        $this->compra = new CompraController();
        $this->factura = new FacturaController();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        if($page == 'Productos'){
            $registros = $this->producto->index();
        }
        if($page == 'Compras'){
            $registros = $this->compra->index();
        }
        if($page == 'Facturas'){
            $registros = $this->factura->index();
        }
        if($page == 'icons'){
            return view("pages.{$page}");
        }
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}",[
                'registros' => $registros
            ]);
        }
        return abort(404);
    }

    

}
