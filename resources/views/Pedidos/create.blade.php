@extends('layouts.admin')

@section('titulo')

    <span> Nuevo Pedido </span>
@endsection 

@section('contenido')
            
<form action="{{ url('/pedidos') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
            <div class=card-body>
                <div class="row">
                   
                    
                

                    <div class="col-lg-4 form-group">
                        <div>
                            <label for="id_cliente" class="form-fields"> Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control {{$errors->has('id_cliente') ? 'is-invalid' : '' }}"
                            value="">
                            <option value="">Seleccione el Cliente</option>
                            @foreach($clientes as $clientes)
                                <option value="{{ $clientes['id'] }}" {{ old('id_cliente') == $clientes->id ? 'selected' : '' }}>{{$clientes['Nombre'] }}</option>
                            @endforeach
                            </select>
                                @if($errors->has('id_cliente'))
                            <span class="text-danger">{{$errors->first('id_cliente')}}</span>
                            @endif
                            </div>    
                    </div>
    
                    <div class="col-lg-4 form-group">    
                        <div>
                            <label for="id_tipo_de_pago" class="form-fields"> Tipo Pago</label>
                                <select name="id_tipo_de_pago" id="id_tipo_de_pago" class="form-control {{$errors->has('id_tipo_de_pago') ? 'is-invalid' : '' }}" >
                                   <option value="" >Seleccione el tipo de pago</option>
                                @foreach($tiposdepago as $tiposdepago)
                                    <option value="{{ $tiposdepago['id'] }}" {{ old('id_tipo_de_pago') == $tiposdepago->id ? 'selected' : '' }}>{{$tiposdepago['Nombre_Tipo_Pago'] }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('id_de_tipo_pago'))
                                     <span class="text-danger">{{$errors->first('id_de_tipo_pago')}}</span>
                                @endif
                        </div>         
                    </div>

                    <div class="col-lg-4 form-group">           
                        <div>
                            <label for="id_usuario" class="form-fields"> Empleado </label>
                            <select name="id_usuario" id="id_usuario" class="form-control {{$errors->has('id_usuario') ? 'is-invalid' : '' }}" >
                                   <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>    
                                </select>
                                @if($errors->has('id_usuario'))
                                    <span class="text-danger">{{$errors->first('id_usuario')}}</span>
                                @endif
                        </div>
                    </div>
                </div>


               
                <div class="card border-primary">
                    <div class=card-body>
                        <div class="row">
                            
                        <div class="col-lg-4 form-group">           
                            <div>
                                <label for="Id_Producto" class="form-fields"> Producto </label>
                                <select name="pId_Producto" id="pId_Producto" class="form-control {{$errors->has('Id_Producto') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione el Producto</option>
                                    @foreach($productos as $productos)
                                        <option value="{{ json_encode($productos['id'],TRUE) }}_{{ $productos->Precio }}"  {{ old('Id_Producto') == $productos->id ? 'selected' : '' }}>{{$productos->NombreProducto }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('Id_Producto'))
                                        <span class="text-danger">{{$errors->first('Id_Producto')}}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="PrecioUnitario" class="form-fields">Precio Unitario </label>
                                
                                    <input type="text" class="form-control" name="pPrecioUnitario" id="pPrecioUnitario" 
                                     value="" disabled>
                                     
                               <!-- @if($errors->has('PrecioUnitario'))
                                    <span class="text-danger">{{$errors->first('PrecioUnitario')}}</span>
                                @endif-->
                            </div>
                        </div>


                        <div class="col-lg-2 form-group">
                            <div>
                                <label for="Cantidad" class="form-fields"> Cantidad </label>
                                <input type="number" class="form-control {{$errors->has('Cantidad') ? 'is-invalid' : '' }}" 
                                name="pCantidad" id="pCantidad" value="{{old('Cantidad')}}" >
                                @if($errors->has('Cantidad'))
                                    <span class="text-danger">{{$errors->first('Cantidad')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_descuento" class="form-fields"> Descuento </label>
                                <select name="pid_descuento" id="pid_descuento" class="form-control {{$errors->has('id_descuento') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione </option>
                                    @foreach($descuentos as $descuentos)
                                        <option value="{{ $descuentos['id'] }}" {{ old('id_descuento') == $descuentos->id ? 'selected' : '' }}>{{$descuentos['ValorDescuento'] }}</option>
                                    @endforeach
                                </select>
                                    @if($errors->has('id_descuento'))
                                        <span class="text-danger">{{$errors->first('id_descuento')}}</span>
                                    @endif
                            </div>
                        </div>

                        
                        <div class="col-lg-2 form-group">           
                            <div>
                                <label for="id_isv" class="form-fields"> ISV </label>
                                <select name="pid_isv" id="pid_isv" class="form-control {{$errors->has('id_isv') ? 'is-invalid' : '' }}" >
                                    <option value="">Seleccione </option>
                                    @foreach($isv as $isv)
                                        <option value="{{ $isv['id'] }}" {{ old('id_isv') == $isv->id ? 'selected' : '' }}>{{$isv['isv'] }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('id_isv'))
                                     <span class="text-danger">{{$errors->first('id_isv')}}</span>
                                @endif
                            </div>
                        </div>

                           
                        
                        <div class="col-lg-2 form-group">
                            <div>
                            <button type="button" id="bt_add" href="#" class="btn btn-primary">
                                Agregar
                                
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <table id="detalles" class="table table-stripped table-bordered dts">
                                <thead style="background-color:#A9D0F5">
                                    <tr>
                                        <th class="text-center">Opciones </th>
                                        <th class="text-center">Producto </th>
                                        <th class="text-center">Precio Unitario</th>
                                        <th class="text-center">Cantidad </th>
                                        <th class="text-center">Descuento</th>
                                        <th class="text-center">ISV</th>
                                        <th class="text-center">Subtotal</th>
                                                            
                                    </tr>
                                </thead>
                               
                                

                                
                                <tbody >
                                <tr>
                                        <td>TOTAL</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                        <span align="right" id="total">0.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                                

                        </div>
                    </div>
                </div>
            

                    

                   
                </div>
            </div>

                    <div class="col-lg-4 form-group " id="bt_guardar"> 
                        <input name="_token " value="{{ csrf_token() }}" type="hidden"></input>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                      <!--  <button class="btn btn-danger" type="reset" href="{{url('/pedidos') }}">Cancelar</button>
-->     
                    </div>

                    <div class="col-lg-4 form-group " id="bt_guardar"> 
                        
                        <a class="btn btn-secondary mr-1" href="{{url('/pedidos') }}">Regresar</a>
                    </div>
                <br>
            </form>


    @push('scripts')
     
    
    <script> 
       $(document).ready(function(){
           evaluar();
           $('#bt_add').click(function(){
               agregar();
           });
       });
        var cont=0;
        total=0;
        subtotal=[];
        $("#guardar").hide();
 $("#pId_Producto").change(mostrarValores);
function mostrarValores() {
    datosProducto = document.getElementById('pId_Producto').value.split('_');
    $("#pPrecioUnitario").val(datosProducto[1]);
    
}
       
   
   
        function agregar()
        {
            //limpiar();
            
            idProducto=$("#pId_Producto").val();
            Producto=$("#pId_Producto option:selected").text();
            PrecioUnitario=$("#pPrecioUnitario").val();
            Cantidad=$("#pCantidad").val();
            id_descuento=$("#pid_descuento").val();
            id_descuentoval=$("#pid_descuento option:selected").text();
            id_isv=$("#pid_isv").val();
            id_isvval=$("#pid_isv option:selected").text();
            if(idProducto!="" && PrecioUnitario!="" && Cantidad!="" && Cantidad>0 && id_descuento!="" && id_isv!="")
            {
                
                subtotal[cont] = (Cantidad*PrecioUnitario);
                 total = total + subtotal[cont];
                                                                                                                        
                var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="idProducto[]" value="'+idProducto+'">'+Producto+'</td><td><input type="number" name="PrecioUnitario[]" value="'+PrecioUnitario+'"></td><td><input type="number" name="CantidadDetalles[]" value="'+Cantidad+'"></td><td><input type="hidden" name="id_descuento[]" value="'+id_descuento+'">'+id_descuentoval+'</td><td><input type="hidden" name="id_isv[]" value="'+id_isv+'">'+id_isvval+'</td><td>'+subtotal[cont]+'</td></tr>';
               // var fila='<tr class="selected" id="fila'+cont+'"><input type="number" name="idProductos[]" value="'+idProducto+'">'+Producto+'</td></tr>';
                
                cont++;
                limpiar();
                $("#total").html("L. " +total);
                evaluar();
                $('#detalles').append(fila);
                
            }else{
                alert("Error al Ingresar el detalle del pedido");    
                }
                
            }
        
        
        function limpiar(){
            $("#pId_Producto").val("");
            $("#pPrecioUnitario").val("");
            $("#pCantidad").val("");
            $("#pid_descuento").val("");
            $("#pid_isv").val("");
            
        } 
        function evaluar(){
            if(total>0)
            {
                $("#bt_guardar").show();
            }else{
                $("#bt_guardar").hide();
            }
        }
        function eliminar(index) {
            total=total-subtotal[index];
            $("#total").html("L. "+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>

    @endpush

    @endsection