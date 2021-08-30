<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function iniciar()
    {

        // //asi se validan los campos
        // request()->validate([
        //     'admin_id' => 'required',
        //     'admin_name' => 'required',
        // ], [

        //     'admin_id.required' => 'La identificación es requerida',
        //     'admin_name.required' => 'La contraseña es requerida'

        // ]);

        return view('PrincipalView');
    }


}
