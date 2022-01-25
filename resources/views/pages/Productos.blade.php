@extends('layouts.app', ['activePage' => 'Productos', 'title' => 'PoderJudicialVirtual', 'navName' => 'Productos', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Productos Registrados</h4>
                            <a href="{{route('crear-producto')}}" class="btn btn-primary ">
                                Crear Producto
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio Base</th>
                                    <th>Impuesto (%)</th>
                                    <th>Precio Total</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $producto)
                                    <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->precio_base}}</td>
                                        <td>{{$producto->impuesto}}</td>
                                        <td>{{$producto->precio_total}}</td>
                                        <td>
                                            <a title='Editar' href="{{route('ver-producto',$producto->id)}}"><i class="nc-icon nc-settings-90"></i></a>
                                            <a title='Eliminar' href="{{route('eliminar-producto',$producto->id)}}"><i class="ml-2 nc-icon nc-simple-delete"></i></a>
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