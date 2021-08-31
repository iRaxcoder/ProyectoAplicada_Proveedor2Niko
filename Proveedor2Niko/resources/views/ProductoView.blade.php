<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@extends('Plantillas.Principal')

@section('cuerpo')

<div class="row">
    <div class="col col-md-3">
        <div class="input-group mt-3 p-3">
            <input type="search" class="form-control rounded" placeholder="Nombre" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">buscar</button>
        </div>
    </div>
    <div class="col col-md-3">
        <button style="position: absolute;top: 72px;" data-bs-toggle="modal" data-bs-target="#modalRegistrar" type=" button" class="btn btn-primary">Agregar nuevo</button>
    </div>
</div>

<hr style="width: 34%; margin: 13px;">

<div class="modal" id="modalRegistrar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar un producto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/articulos/guardarArticulo" method="POST" class="mt-2 ml-2 p-3">

                    @csrf
                    <div class="form-group">
                        <label for="lblNombre">Nombre</label>
                        <input type="text" class="form-control" value="{{old('nombre')}}" name="nombre" id="nombre" placeholder="nombre del producto">

                        {!! $errors->first('nombre','<small style="color: red;">:message</small>') !!}

                    </div>
                    <div class="form-group mt-2">
                        <label for="itPrecio">Precio</label>
                        <input type="number" min="1" name="precio" value="{{old('precio')}}" class="form-control" id="precio" placeholder="precio">
                        {!! $errors->first('precio','<small style="color: red;">:message</small>') !!}
                    </div>
                    <div class="form-group mt-2">
                        <label for="itFile">Imagen</label>
                        <input type="file" id="imagen" value="{{old('imagen')}}" name="imagen">
                        {!! $errors->first('imagen','<small style="color: red;">:message</small>') !!}
                    </div>
                    <div class="form-group mt-2">
                        <label for="itStocl">Stock</label>
                        <input type="number" min="1" name="stock" value="{{old('stock')}}" class="form-control" id="stock" placeholder="disponibles">
                        {!! $errors->first('stock','<small style="color: red;">:message</small>') !!}
                    </div>
                    <div class="form-group mt-2">
                        <label for="sCategoria">Categoría</label>
                        <select id="categoria" name="categoria" value="{{old('categoria')}}" class="form-select" aria-label="Default select example">
                            <option>Seleccionar categoría</option>
                            @foreach($datos['categorias'] as $categoria)
                            <option>{{$categoria->NOMBRE_CATEGORIA}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('categoria','<small style="color: red;">:message</small>') !!}
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Agregar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@if(session()->has('mensaje'))

@if (session()->get('mensaje')=="Ya existe un producto con ese nombre.")
<div class="alert alert-danger">
    {{ session()->get('mensaje') }}
</div>
@else

<div class="alert alert-success">
    {{ session()->get('mensaje') }}
</div>
@endif

@endif


@if (count ($datos['productos']))

<table class="table p-3 table-responsive">
    <th>
        ID
    </th>
    <th>
        Nombre
    </th>
    <th>
        Precio
    </th>
    <th>
        Ruta Imagen
    </th>
    <th>
        Stock
    </th>
    <th>
        Categoria
    </th>

    <th>
        Acción
    </th>
    @foreach ($datos['productos'] as $producto)
    <tr>
        <td>
            {{$producto->ID_PRODUCTO}}
        </td>


        <td>
            {{$producto->NOMBRE_PRODUCTO}}
        </td>


        <td>
            {{$producto->PRECIO}}
        </td>


        <td>
            {{$producto->RUTA_IMAGEN}}
        </td>

        <td>
            {{$producto->STOCK}}
        </td>

        <td>
            {{$producto->ID_CATEGORIA}}
        </td>

        <td>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar">
                <i class="fas fa-edit"></i>
            </button>

            <button class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
            </button>

        </td>

    </tr>

    @endforeach
</table>

@else

{{"sin productos"}}

@endif

<div class="modal" id="modalEditar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar un producto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar cambios</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>



@endsection