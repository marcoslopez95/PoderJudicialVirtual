@extends('layouts.app', ['activePage' => 'Facturas', 'title' => 'PoderJudicialVirtual', 'navName' => 'Facturas', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Facturas Registradas</h4>
                
                            @if (Auth::user()->tipo_usuario == 1)
                            <a href="{{route('generar-factura-masiva')}}" class="btn btn-primary ">
                                Generar Facturas Masivas
                            </a>    
                            @endif
                            
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    @if (Auth::user()->tipo_usuario == 1)
                                        <th>Cliente</th>
                                    @endif
                                    <th>Fecha de Factura</th>
                                    <th>Precio Base</th>
                                    <th>Impuestos</th>
                                    <th>Precio Total</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $factura)
                                    <tr>
                                        <td>{{$factura->id}}</td>
                                        @if (Auth::user()->tipo_usuario == 1)
                                            <td>{{$factura->nombre_user}}
                                        @endif
                                        <td>{{$factura->fecha}}</td>
                                        <td>{{$factura->base}}</td>
                                        <td>{{$factura->impuestos}}</td>
                                        <td>{{$factura->total}}</td>
                                        <td>
                                            <a title='Ver Detalle' href="{{route('ver-factura',$factura->id)}}"><i class="nc-icon nc-cart-simple" alt='Ver Factura'></i></a>
    
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection