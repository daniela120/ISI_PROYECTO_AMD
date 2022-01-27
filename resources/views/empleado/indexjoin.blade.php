@extends('layouts.admin')

@section('titulo')

    <span>Ver Empleados </span>
    <div>
    <a href="/empleado" class="btn btn-success btn-circle" >
    <i class="fas fa-users"></i>
    </a>

    <a href="/cargoempleadohistorico" class="btn btn-success btn-circle" >
    <i class="fas fa-history"></i>
    </a>


    </div>
   

@endsection 
    @section('contenido')
    
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-Empleados" class="table table-stripped table-bordered dts">
                    <thead>
                    <tr>
                        
                            <th class="text-center"><font size=2>Id </th>
                            <th class="text-center"><font size=2>Nombre</th>
                            <th class="text-center"><font size=2>Apellido</th>
                            <th class="text-center"><font size=2>Fecha de Nacimiento</th>
                            <th class="text-center"><font size=2>Fecha de Contratación</th>                            
                            <th class="text-center"><font size=2>Cargo</th>
                            <th class="text-center"> <font size=2>Teléfono</th>
                            <th class="text-center"><font size=2>Usuario</th>
                            <th class="text-center"><font size=2>Turno</th>                                                     
                            <th class="text-center"><font size=2>Documento</th>
                            <th class="text-center"><font size=2>Tipo Doc</th>  
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($probando as $empleado)
                        <tr>
                        
                                <td><font size=1>{{$empleado->id}}</td>
                                <td><font size=1>{{$empleado->Nombre}}</td>
                                <td><font size=1>{{$empleado->Apellido}}</td>
                                <td><font size=1>{{$empleado->FechaNacimiento}}</td>
                                <td><font size=1>{{$empleado->FechaContratacion}}</td>
                                
                                <td><font size=1>{{$empleado->Cargo}}</td>
                                <td><font size=1>{{$empleado->Telefono}}</td>
                                <td><font size=1>{{$empleado->name}}</td>
                                <td><font size=1>{{$empleado->TipoTurno}}</td>
                                                               
                                <td><font size=1>{{$empleado->Documento}}</td>
                                <td><font size=1>{{$empleado->TipoDocumento}}</td>
                                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editEstadoEnvio para pasar parametros y editar-->

   <!---->
    

<!-- para validaciones-->
@if(!$errors->isEmpty())
@if($errors->has('post'))
    <script>
        $(function () {
            $('#createMdl').modal('show');
        });
    </script>   
@else
<script>
        $(function () {
            $('#editMdl').modal('show');
        });
    </script>
@endif
@endif

@endpush