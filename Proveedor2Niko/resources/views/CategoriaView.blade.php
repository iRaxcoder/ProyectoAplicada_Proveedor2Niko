@extends('Plantillas.Principal')


@section('cuerpo')

<div class="row">
    <div class="col col-md-3">
        <div class="input-group mt-3 p-3">
            <input type="search" class="form-control rounded" placeholder="Categoria" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">buscar</button>
        </div>
    </div>
    <div class="col col-md-3">
        <button style="position: absolute;top: 72px;" data-bs-toggle="modal" data-bs-target="#modalRegistrar" type=" button" class="btn btn-primary">Agregar nueva categoria</button>
    </div>
</div>

@if (count ($datos['categorias']))

<table id="table" class="table p-3 table-responsive">
    <th>
        ID
    </th>
    <th>
        Categoría
    </th>

    <th>
        Acción
    </th>
    @foreach ($datos['categorias'] as $categoria)
    <tr>
        <td>
            {{$categoria->ID_CATEGORIA}}
        </td>

        <td>
            {{$categoria->NOMBRE_CATEGORIA}}
        </td>

        <td>
            <button data-idCategoria="{{$categoria->ID_CATEGORIA}}" class="btn btn-primary" onclick="ponerInfoProductEnModal(this);" class="btn btn-primary" onclick="ponerInfoProductEnModal(this); return false;" data-bs-toggle="modal" data-bs-target="#modalEditar">
                <i class="fas fa-eye"></i>
            </button>
            <button data-nombreCategoria="{{$categoria->NOMBRE_CATEGORIA}}" data-idCategoria="{{$categoria->ID_CATEGORIA}}" class="btn btn-secondary" onclick="ponerInfoProductEnModal(this); return false;" data-bs-toggle="modal" data-bs-target="#modalEditar">
                <i class="fas fa-edit"></i>
            </button>
        </td>
    </tr>

    @endforeach
</table>

@else

<div class="alert alert-danger">
    No hay categorias
</div>

@endif

<div class="modal" id="modalRegistrar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registrar una categoría</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/categorias/guardarCategoria" method="POST" class="mt-2 ml-2 p-3">
                    @csrf
                    <div class="form-group">
                        <label for="lblNombre">Nombre</label>
                        <input type="text" class="form-control" value="{{old('nombre')}}" name="nombre" id="nombre" placeholder="nombre">
                        {!! $errors->first('nombre','<small style="color: red;">:message</small>') !!}
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

@endsection