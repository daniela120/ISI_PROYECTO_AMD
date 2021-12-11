<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Models\detallepedidos;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\tiposdepago;
use App\Models\clientes;
use App\Models\descuentos;
use App\Models\productos;
use App\Models\isv;
use App\HTTP\Requests\PedidosRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado=Empleado::all();  
    
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

        $descuentos=descuentos::all();

        $isv=isv::all();
        
        $pedidos=pedidos::paginate(15);

        return view('Pedidos.pedidosindex')->withEmpleado($empleado)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withPedidos($pedidos);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado=Empleado::all();  
        
        $productos=productos::all();

        $tiposdepago=tiposdepago::all();

        $clientes=clientes::all();

       $descuentos=descuentos::all();

       $isv=isv::all();

       $mytime= Carbon::now("America/Lima");
                
                $Hoy=$mytime->toDateTimeString();

       // $empleado=DB::table('empleados as e')->where('')
         //   ->join('productos as pr','pr.id','=','pd.id_producto')
           // ->select('dp.id_pedido','pr.NombreProducto', 'dp.Cantidad','dp.descuento')
            //->where('dp.id_pedido','=',$id)
            //->get(); 

        return view('Pedidos.create')->withEmpleado($empleado)->withHoy($Hoy)->withProductos($productos)->withTiposdepago($tiposdepago)->withClientes($clientes)->withDescuentos($descuentos)->withIsv($isv);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidosRequest $request)
    {
         
          try {
            //code...
                DB::beginTransaction();
                
                
                
                $mytime= Carbon::now("America/Lima");
                
                $Hoy=$mytime->toDateTimeString();
                
                
                DB::insert('insert into pedidos (id_empleado,Fecha,id_tipo_de_pago,id_cliente) values (?, ?, ?, ?)', [$request->get('id_empleado'), $Hoy,$request->get('id_tipo_de_pago'),$request->get('id_cliente')]);
                $data=DB::table('pedidos')->get();
                $last=$data->last();


                
                
                
                
                //detalles
                $idProducto=$request->get('idProducto');
                $PrecioUnitario=$request->get('PrecioUnitario');
                $Cantidad=$request->get('CantidadDetalles');
                $id_descuento=$request->get('id_descuento');
                $id_isv=$request->get('id_isv');
            

                $iteraciones=count($idProducto);
                        for ($i=0; $i < $iteraciones; $i++) { 
                            # code...
                            $detalles= new detallepedidos(); 
                            $detalles->id_pedido=$last->id_pedido;
                            $detalles->Id_Producto=$idProducto[$i];
                            $detalles->PrecioUnitario=$PrecioUnitario[$i];
                            $detalles->Cantidad=$Cantidad[$i];
                            $detalles->id_descuento=$id_descuento[$i];
                            $detalles->id_isv=$id_isv[$i];
                            //$detalles->Total=$detalles->PrecioUnitario[$cont] * $detalles->Cantidad[$cont];
                            $detalles->Total=$PrecioUnitario[$i] * $Cantidad[$i];
                            $detalles->save();
                            //$cont=$cont+1;
                        }
                   
                   // }
                    
               // } 
                //dd($detalles);
            //dd($pedidos);
                //dd($idProducto,$PrecioUnitario,$Cantidad,$id_descuento,$id_isv);
                //dd($PrecioUnitario);
                //dd($Cantidad);
                DB::commit();

              
            } catch (\Exception $exception) {
                //throw $th;
                return view('errores.errors',['errors'=>$exception->getMessage()]);
               // DB::rollback();
             //  return view('errores.errors',['errors'=>$exception->getMessage()]);
    
           }
          
          
          /** 
           $pedidos=new pedidos;
           $pedidos->id_empleado=$request->get('id_empleado');
           $mytime= Carbon::now("America/Lima");
           $pedidos->Fecha=$mytime->toDateTimeString();
           $pedidos->id_tipo_de_pago=$request->get('id_tipo_de_pago');
           $pedidos->id_cliente=$request->get('id_cliente');
           //$detalles->save();
          
         

           $idProducto=$request->get('idProducto');
           $PrecioUnitario=$request->get('PrecioUnitario');
                $Cantidad=$request->get('CantidadDetalles');
                $id_descuento=$request->get('id_descuento');
                $id_isv=$request->get('id_isv');
                
                $cont = 0;

           while($cont< count($idProducto)){
            $detalles= new detallepedidos(); 
            $detalles->id_pedido=$pedidos->id_pedido;
            $detalles->Id_Producto=$idProducto[$cont];
            $detalles->PrecioUnitario=$PrecioUnitario[$cont];
            $detalles->Cantidad=$Cantidad[$cont];
            $detalles->id_descuento=$id_descuento[$cont];
            $detalles->id_isv=$id_isv[$cont];
            $detalles->Total=$detalles->PrecioUnitario[$cont] * $detalles->Cantidad[$cont];
            //$detalles->save();
            $cont=$cont+1;
        } 
          **/ 
            
        alert()->success('Pedido guardado correctamente');
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedidos=DB::table('pedidos as p')
            ->join('tiposdepagos as tp','tp.id','=','p.id_tipo_pago')
            ->join('empleados as e','e.id','=','p.id_empleado')
            ->join('clientes as c','c.id','=','p.id_cliente')
            ->join('detallepedidos as dp','dp.id_pedido','=','p.id_pedido')
            ->select('p.id_pedido','p.Fecha','e.Nombre','c.Nombre','tp.Nombre_Tipo_Pago',DB::raw('sum(dp.Cantidad*PrecioUnitario) as total'))
            ->where('p.id_pedido','=',$id)
            ->first();

        $detalles=DB::table('detallepedidos as dp')
            ->join('productos as pr','pr.id','=','dp.Id_Producto')
            ->join('descuentos as desc','desc.id','=','dp.id_descuento')
            ->join('isvs as i','i.id','=','dp.id_isv')
            ->select('dp.id_pedido','pr.NombreProducto', 'dp.Cantidad','desc.ValorDescuento','i.isv')
            ->where('dp.id_pedido','=',$id)
            ->get();     
        return view("Pedidos.create.show",["pedidos"=>$pedidos,"detalles"=>$detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit(pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
   /**
    * 
    public function destroy(pedidos $id)
    {
        //
        try {
            //code...
            productos::destroy($id);
        } catch (\Exception $exception) {
            //throw $th;
            return view('errores.errors',['errors'=>$exception->getMessage()]);

        }
        $pedidos=pedidos::findOrFail($id);
        $pedidos->update();
        
        return redirect('pedidos/create');
    }

    
    */ 

}
