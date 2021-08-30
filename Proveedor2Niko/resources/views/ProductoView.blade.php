<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@extends('Plantillas.Principal')

@section('cuerpo')

<div class="row">
    <div class="col col-md-3">
        <div class="input-group mt-3 p-3">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">buscar</button>
        </div>
    </div>
    <div class="col col-md-3">
        <button style="position: absolute;top: 72px;" data-bs-toggle="modal" data-bs-target="#modalRegistrar" type=" button" class="btn btn-primary">Agregar nuevo</button>
    </div>
</div>

<hr>

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
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Registrar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


@if (count ($productos))

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
    @foreach ($productos as $producto)
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

            <button data-bs-toggle="modal" data-bs-target="#modalEditar">
                <i class="fas fa-edit"></i>
            </button>

            <button>
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