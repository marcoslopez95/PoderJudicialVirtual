@extends('layouts.app', ['activePage' => 'Compras', 'title' => 'PoderJudicialVirtual', 'navName' => 'Compras', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="container row">
                                <h4 class="card-title col">Crear Compra</h4>
                                <div class="col-1 col-sm-1">
                                    <a href="{{route('page.index', 'Compras')}}" class="btn btn-info">
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
                            <form class="container" action="{{route('guardar-compra')}}" method="POST" id="compra">
                                @csrf
                                <div class="row">
                                    @if (Auth::user()->tipo_usuario == 1)
                                    <div class="mb-4 col-sm-12 form-inline">
                                        <label for="nombre" class="form-label">Nombre o Correo electrónico del Cliente:</label>
                                        <input type="text" class="form-control" id="buscar_user" name='buscar_user' value={{}}>
                                        <select id='select_user' name='user_id' class="form-control ml-3 col-3">
                                        </select>
                                    </div>    
                                    @else
                                    <input type="hidden" name='user_id' value="{{Auth::user()->id}}" />
                                    @endif
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="form-label">Productos Agregados:</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Eliminar</th>
                                </thead>
                                <tbody id='productos_agregados'>
                                    
                                </tbody>
                            </table> 
                                    </div>
                        </div>
                                <div class="row">
                                    <div class="mb-4 col-sm-4">
                                        <label for="precio_total" class="form-label">Buscar Productos:</label>
                                        <input type="text" class="form-control" id="buscar_productos" name='buscar_productos'>
                                    </div>

                                    <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Agregar</th>
                                </thead>
                                <tbody id='productos'>
                                    
                                </tbody>
                            </table> 
                                    </div>
                        </div>
                                </div>
                                <div class="row">
                                    <div class="mb col-sm text-right">
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
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
<script>
    var busqueda_clientes
    var busqueda_productos
$(document).ready(function(){
    $('#buscar_user').keyup(function () { 
        $("#select_user").empty();
        let buscar = $(this).val()
        console.log(buscar);

        axios.get("http://127.0.0.1:8001/users/buscar?name_email="+buscar)
            .then(function (response) {
                    console.log(response.data);
                    if(response.data.length > 0){
                        busqueda_clientes = response.data
                    }
                    
                })
                
        $.each(busqueda_clientes, function (indexInArray, valueOfElement) {
            //console.log('vaor '+valueOfElement.id);
            $("#select_user").append("<option id='user_id' name='user_id' value='"+valueOfElement.id+"'>"+valueOfElement.name+"</option>");
        });
    });

    $('#buscar_productos').keyup(function () { 
        $("#productos").empty();
        var buscar = $(this).val()
        console.log(buscar);

        axios.get("http://127.0.0.1:8001/Producto/buscar?nombre="+buscar)
            .then(function (response) {
                    console.log(response.data);
                    if(response.data.length > 0){
                        busqueda_productos = response.data
                    }
                })
                
        $.each(busqueda_productos, function (indexInArray, valueOfElement) {
            //console.log('vaor '+valueOfElement.id);
            $("#productos").append(`
                <tr>
                    <td>
                        ${valueOfElement.id}
                    </td>
                    <td>
                        ${valueOfElement.nombre}
                    </td>
                    <td>
                        ${valueOfElement.precio_total}
                    </td>
                    <td>
                        <input type='checkbox' class='form-check' onClick='Agregar(event,${indexInArray})' id='producto_check' name='producto_check' value='${valueOfElement.id}'>
                    </td>
                <tr>
                `);
        });
    });
});

function Agregar(event,index){
    if(Verificar(busqueda_productos[index].id))
    {
        return
    }

    if(event.target.checked === true){
        var producto_nuevo = busqueda_productos[index]
        $("#productos_agregados").append(`
                <tr id='producto_${producto_nuevo.id}'>
                    <td>
                        ${producto_nuevo.id}
                    </td>
                    <td>
                        ${producto_nuevo.nombre}
                    </td>
                    <td>
                        ${producto_nuevo.precio_total}
                    </td>
                    <td>
                        <input type='checkbox' class='form-check' checked onClick='Quitar(event,${producto_nuevo.id})' id='producto_id' name='producto_id[]' value='${producto_nuevo.id}'>
                    </td>
                <tr>
                `);
    }
}

function Verificar(producto){
    return $("#producto_"+producto).length
}

function Quitar(event, cont){
    console.log(event);
    if(event.target.checked === false){
        //$("#productos_agregados").find(item => item.id == event.target.defaultValue).remove()
        $("#producto_"+cont).remove()
    }
       
}

</script>
@endsection

