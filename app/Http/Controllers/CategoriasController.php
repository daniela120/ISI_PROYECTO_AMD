<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriasRequest;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //code...
            $datos['Categorias']=Categorias::paginate(10);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);
        }
       
        return view('Categorias.categoriasindex',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriasRequest $request)
    {


        try {
            //code...
            $Categorias = request()->except('_token');
        Categorias::insert($Categorias);
        
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        
        
        alert()->success('Categoría Guardada Correctamente');
        
        return redirect()->route('categorias.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriasRequest $request, $id)
    {

        try {
            //code...
            $Categorias= request()->except(['_token','_method']);
            Categorias::where('id','=',$id)->update($Categorias);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Categoría Actualizada Correctamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            //code...
            Categorias::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
       
        alert()->success('Categoría Eliminada Correctamente');
        return redirect('categorias');
    }
}
