<?php

namespace App\Http\Controllers;

use App\Models\precio_his_inventario;
use Illuminate\Http\Request;
use App\Models\Inventarios;
use Illuminate\Support\Facades\DB;

class PrecioHisInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        try {
            //code...
            //$precio_his_inventario=precio_his_inventario::paginate(15);
           // $inventarios=inventarios::all();

            $probando=DB::table('precio_his_inventarios as h')
            ->join('inventarios as i','h.id_inventario','=','i.id')
            ->select('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
            ->orderby('h.id')
            ->groupBy('h.id','i.NombreInventario','h.FechaInicio','h.FechaFinal','h.Precio')
            ->paginate(15);

        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
    
        return view('precioinventario.index')->withProbando($probando);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function show(precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, precio_his_inventario $precio_his_inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\precio_his_inventario  $precio_his_inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(precio_his_inventario $precio_his_inventario)
    {
        //
    }
}
