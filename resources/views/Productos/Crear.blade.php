@extends('layouts.app', ['activePage' => 'productos', 'title' => 'PoderJudicialVirtual', 'navName' => 'Productos', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="container row">
                                <h4 class="card-title col">Crear Producto</h4>
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
                                <div class="row">
                                    <div class="mb-4 col-sm-4">
                                        <label for="nombre" class="form-label">Nombre del Producto:</label>
                                        <input type="text" class="form-control" id="nombre" name='nombre'>
                                    </div>
                                    <div class="mb-4 col-sm-4">
                                        <label for="precio_base" class="form-label">Precio Base:</label>
                                        <input type="number" class="form-control" id="precio_base" name='precio_base' step="0.01">
                                    </div>
                                    <div class="mb-4 col-sm-4">
                                        <label for="impuesto" class="form-label">impuesto (%):</label>
                                        <input type="number" class="form-control" id="impuesto" name='impuesto' min="0" max="100" step="0.01" placeholder="10%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-4 col-sm-4">
                                        <label for="precio_total" class="form-label">Precio Total:</label>
                                        <input type="number" class="form-control" id="precio_total" name='precio_total' disabled>
                                    </div>
                                    <div class="mb col-sm">
                                        <input type="submit" class="btn btn-primary" value='Guardar' />
                                    </div>
                                    
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src='{{ asset('/js/jquery-3.js') }}'></script>
<script>

    $(document).ready(function(){
        var total = 0;
	$("#precio_base").change(function () {
        if(!(isNaN($('#impuesto').val()))){
            /* let impuesto = parseInt($('#impuesto').val()); */
            var impuesto = parseInt(document.getElementById('impuesto').value);
            /* let precio_base = parseInt($('#precio_base').val()); */
            var precio_base = parseInt(document.getElementById('precio_base').value);
            
            $('#precio_total').val(precio_base * (1 + (impuesto/100)))
        }
//        $('#precio_total') = $('#precio_base').val() * ( 1 + $('#impuesto').val())
	});
    $("#impuesto").change(function () {
        if(!(isNaN($('#precio_base').val()))){
            /* let impuesto = parseInt($('#impuesto').val()); */
            var impuesto = parseInt(document.getElementById('impuesto').value);
            /* let precio_base = parseInt($('#precio_base').val()); */
            var precio_base = parseInt(document.getElementById('precio_base').value);
            

            $('#precio_total').val(precio_base * (1 + (impuesto/100)))
        }
	});
});
</script>
@endsection
