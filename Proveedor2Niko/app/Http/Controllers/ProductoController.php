<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['categorias'] = DB::table('tb_categoria')->get();
        $datos['productos'] = tb_producto::all();
        return view('ProductoView')->with('datos', $datos);
    }

    public function ShowAgregar()
    {
        $categorias['categorias'] = DB::table('tb_categoria')->get();
        return view('crear')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //asi se validan los campos
        request()->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'imagen' => 'required',
            'stock' => 'required',
            'categoria' => 'required'
        ], [

            'nombre.required' => 'El nombre del producto es requerido'
        ]);

        //busca id en la base de datos

        $id_categoria = DB::table('tb_categoria')
            ->select('ID_CATEGORIA')
            ->where('NOMBRE_CATEGORIA', '=', request('categoria'))
            ->get();

        //construye procedimiento almacenado

        $procsentence = "CALL sp_insertar_producto( :nombre, :precio, :imagen, :stock, :categoria)";

        $params = array();
        $params['nombre'] = $request->nombre;
        $params['precio'] = $request->precio;
        $params['imagen'] = $request->imagen;
        $params['stock'] = $request->stock;
        $params['categoria'] = $id_categoria->toArray()[0]->{"ID_CATEGORIA"};

        $res = array();
        $res = DB::select($procsentence, $params);

        if (isset($res[0]->{1})) {
            return redirect('/Productos/gestionar')->with('mensaje', 'Guardado con éxito.');
        } else {
            return redirect('/Productos/gestionar')->with('mensaje', 'Ya existe un producto con ese nombre.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
