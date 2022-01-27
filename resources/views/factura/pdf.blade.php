<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{public_path('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
    Mr. Coffe

    <div class="col-lg-3 form-group">
                            <div>
                                <label for="fecha" class="form-fields">Fecha y Hora</label>
                                <p>{{\Carbon\Carbon::parse($hoy)->format('d M y h:i a')}}</p> 
                            </div>
                    </div>

                    <input type="hidden" name="inputpedido" id="inputpedido" value="{{($idpedido)}}">
                                

                    <div class="col-lg-3 form-group">
                            <div>
                                <label for="Direccion" class="form-fields">Dirección</label>
                                <p>Colonia Humuya, Avenida Altiplano, Calle Poseidón, 11101</p> 
                            </div>
                    </div>


    <table id="parametro" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                 <tr>
                                          
                                        <th class="text-center">RTN </th>
                                        <th class="text-center">Fecha Vencimiento</th>
                                        <th class="text-center">CAI</th>
                                        <th class="text-center">Rango Inicial</th>
                                        <th class="text-center">Rango Final</th>
                                        
                                                            
                                    </tr>
                                    
                                </thead>
                             
                                <tbody >
                                
                                  @foreach($parametro as $parametro)
                                <tr>
                                        
                                        <td>{{$parametro->rtn}}</td>
                                        <td>{{$parametro->fechavencimiento}}</td>
                                        <td>{{$parametro->CAI}}</td>
                                        <td>{{$parametro->rangoinicial}}</td>
                                        <td>{{$parametro->rangofinal}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                
    </table>

    

    

                    

                   

                   

                    

                    

                   

                  


                    <table id="datoscompra" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                 <tr>
                                          
                                        <th class="text-center">Datos de compra </th>
                                                    
                                    </tr>
                                    
                                </thead>
                             
                                <tbody >
                     
                                <tr>
                                        
                                    <th class="text-center">Atendido por:</th>
                                    <th>{{($empleadonombre)}}</th>
                                        
                                        
                                </tr>

                                <tr>
                                    <th class="text-center">Cliente:</th>
                                    <th>{{($clientenombre)}}</th>
                                        
                                </tr>

                                <tr>
                                    <th class="text-center">Num Pedido:</th>
                                    <th>{{($datopedido)}}</th>
                                </tr>

                                    
                                </tbody>
                                
    </table>

                            <table id="detalles" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                 <tr>
                                          
                                        <th class="text-center">Producto </th>
                                        <th class="text-center">Precio Unitario</th>
                                        <th class="text-center">Cantidad </th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">ISV</th>
                                        <th class="text-center">Subtotal</th>
                                                            
                                    </tr>
                                    
                                </thead>
                               
                                

                                
                                <tbody >
                                @foreach($detallepedidos as $detallepedidos)
                                  
                                <tr>
                                        
                                        <td>{{$detallepedidos->NombreProducto}}</td>
                                        <td>{{$detallepedidos->Precio}}</td>
                                        <td>{{$detallepedidos->Cantidad}}</td>
                                        <td>{{$detallepedidos->ValorDescuento}}</td>
                                        <td>{{$detallepedidos->isv}}</td>
                                        <td>{{$detallepedidos->Cantidad*$detallepedidos->Precio-$detallepedidos->ValorDescuento}}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th class="text-center">Cambio </th>
                                        <th class="text-center">Subtotal </th>                                       
                                        <th class="text-center">Descuento </th>
                                        <th class="text-center">ISV </th>
                                        <th class="text-center">Total </th>


                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>{{($cambio)}} .L</td>
                                        <td>{{($subtotalpedido)}} .L</td>
                                        <td>{{($acumdescuento)}} .L</td>
                                        <td>{{($acumimpuesto)}} .L</td>
                                        <td>{{($valortotal)}} .L</td>

                                    </tr>

                                </tfoot>
                            </table>



</body>
</html>