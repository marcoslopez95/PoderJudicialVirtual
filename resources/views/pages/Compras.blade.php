@extends('layouts.app', ['activePage' => 'Compras', 'title' => 'PoderJudicialVirtual', 'navName' => 'Compras', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Compras Registradas</h4>
                            <a href="{{route('crear-compra')}}" class="btn btn-primary ">
                                Crear Compra
                            </a>
                            @if (Auth::user()->tipo_usuario == 1)
                            <a href="{{route('generar-factura-masiva')}}" class="btn btn-primary ">
                                Generar Factura Masiva
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
                                    <th>Fecha de Compra</th>
                                    <th>Precio Base</th>
                                    <th>Impuestos</th>
                                    <th>Precio Total</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $compra)
                                    <tr>
                                        <td>{{$compra->id}}</td>
                                        @if (Auth::user()->tipo_usuario == 1)
                                            <td>{{$compra->nombre_user}}
                                        @endif
                                        <td>{{$compra->fecha_compra}}</td>
                                        <td>{{$compra->base}}</td>
                                        <td>{{$compra->impuestos}}</td>
                                        <td>{{$compra->total}}</td>
                                        <td>
                                            <a title='Eliminar' href="{{route('eliminar-compra',$compra->id)}}"><i class="ml-2 nc-icon nc-simple-delete"></i></a>
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