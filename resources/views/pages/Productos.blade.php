@extends('layouts.app', ['activePage' => 'Productos', 'title' => 'PoderJudicialVirtual', 'navName' => 'Productos', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover container">
                        <div class="card-header justify-content-between row">
                            <h4 class="card-title col-4 my-auto">Productos Registrados</h4>
                            <a href="{{route('crear-producto')}}" class="btn btn-primary col-2">
                                Crear Producto
                            </a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover w-100">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio Base</th>
                                    <th>Precio Venta</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $producto)
                                    <tr>
                                        <td>{{$producto->id}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->precio_base}}</td>
                                        <td>{{$producto->precio_venta}}</td>
                                        <td>{{$producto->stock}}</td>
                                        <td  class="p-0 w-100">
                                            <btn-product 

                                                :producto={{$producto}}>
                                                @csrf
                                            </btn-product>
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