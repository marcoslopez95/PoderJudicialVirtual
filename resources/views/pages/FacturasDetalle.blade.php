@extends('layouts.app', ['activePage' => 'Facturas', 'title' => 'PoderJudicialVirtual', 'navName' => 'Detalle de Factura', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row mb-3">  
                                    <h4 class="card-title col col-sm">Cliente: {{$factura->nombre_user}} </h4>
                                    <h4 class="card-title col col-sm">Fecha de facturación: {{$factura->fecha}}</h4>
                                
                            </div>
                            <div class="row">
                                
                                <div class="col col-sm">
                                    <div>
                                        Base Imponible: {{$factura->base}}
                                    </div>
                                </div>
                                <div class="col col-sm">
                                    <div>
                                        Impuestos: {{$factura->impuestos}}
                                    </div>
                                </div>
                                <div class="col col-sm">
                                    <div>
                                        Total facturado: {{$factura->total}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <hr>
                            
                            @foreach ($factura['compras'] as $compra)
                            <table class="table table-hover mb-0">
                                <thead>
                                    <th>
                                        <h5 class="title">ID de la compra: {{$compra->id}}</h5>
                                    </th>
                                    
                                    <th>
                                        <h5 class='title'> Fecha: {{$compra->fecha_compra}}</h5>
                                    </th>
                                    <th>
                                        <h5 class='title'> Base Imponible: {{$compra->base}}</h5>
                                    </th>
                                    <th>
                                        <h5 class='title'> Impuestos: {{$compra->impuestos}}</h5>
                                    </th>
                                    <th>
                                        <h5 class='title'> Total: {{$compra->total}}</h5>
                                    </th>
                                </thead>
                            </table>
                                <table class="table table-hover">
                                    <thead>
                                        <th>
                                            <h6 class="title">Productos</h6>
                                        </th>
                                    </thead>
                                    <thead>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Precio Base</th>
                                        <th>Impuestos</th>
                                        <th>Precio Total</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($compra['productos'] as $producto)
                                        <tr>
                                            <td>{{$producto->id}}</td>
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->pivot->base}}</td>
                                            <td>{{$producto->pivot->impuesto}}</td>
                                            <td>{{$producto->pivot->total}}</td>
                                            
                                        </tr>    
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                <hr width='50%' align='center'>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection