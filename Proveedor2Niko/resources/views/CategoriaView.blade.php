@extends('Plantillas.Principal')

@section('cuerpo')
<link rel="stylesheet" href="/css/animacionCarga2.css">

<div class="cargando"></div>


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
<hr style="width: 41%; margin: 13px;">

@if (count ($datos['categorias']))

<table id="tableCategorias" class="table p-3 table-responsive">
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
            <button class="btn btn-primary" onclick="ponerInfoProductEnModal(this); return false;" data-bs-toggle="modal" name="{{$categoria->NOMBRE_CATEGORIA}}" id="{{$categoria->ID_CATEGORIA}}" data-bs-target="#modalVer">
                <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <form action="/Categorias/guardarCategoria" method="POST" class="mt-2 ml-2 p-3">
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

<div class="modal" id="modalVer" tabindex="-1" role="dialog">
<div class="loader2" style="display: none;">
    <img class="loading-image" height="100px" width="100px" src="/otrosRecursos/cargando.gif" alt="loading..">
</div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="resultadoCategoria" class="modal-title"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="mensaje"></div>
            <div class="modal-body">
                <table id="tableProductosCat" class="table p-3 table-responsive">
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
                        Imagen
                    </th>
                    <th>
                        Ruta img
                    </th>
                    <th>
                        Stock
                    </th>
                    <tbody>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</script>
<script src="{{asset('js/VerProductoCategoria.js')}}"></script>
@endsection