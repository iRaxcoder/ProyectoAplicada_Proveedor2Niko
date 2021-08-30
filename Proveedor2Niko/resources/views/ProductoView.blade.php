@extends('Plantillas.Principal')

@section('cuerpo')


@if (count ($productos))

<table class="table ">
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
        <td>
            {{$producto->ID_CATEGORIA}}
    </tr>

    @endforeach
</table>

@else

{{"sin productos"}}

@endif


@endsection