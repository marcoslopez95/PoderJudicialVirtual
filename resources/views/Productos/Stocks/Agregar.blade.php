@extends('layouts.app', ['activePage' => 'productos', 'title' => 'PoderJudicialVirtual', 'navName' => 'Productos', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="container row">
                                <h4 class="card-title col">Agregar Stock</h4>
                                <div class="col-1 col-sm-1">
                                    <a href="{{route('page.index', 'Productos')}}" class="btn btn-info">
                                        Regresar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="container" action="{{route('guardar-producto')}}" method="POST" id="producto">
                                @csrf
                                <agregar-stock :producto="{{$producto}}"  />
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection