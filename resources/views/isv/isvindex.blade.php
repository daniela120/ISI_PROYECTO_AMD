@extends('layouts.admin')

@section('titulo')

    <span>Valor Impuesto</span>
    
    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
        <i class="fas fa-plus"></i>
    </a>

@endsection
    @section('contenido')
    @include('isv.create')
    @include('isv.edit')
    @include('isv.delete')
    <!-- tabla -->
    <div class="card">
            <div class=card-body>
                <table id="dt-usuario" class="table table-stripped table-bordered dts">
                    <thead>
                        <tr>
                            <th class="text-center">Acciones</th>
                            <th class="text-center">id</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">isv</th>                             
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($isv as $isv)
                        <tr>
                            <td>
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                 onclick="editIsv({{$isv}})">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                onclick="deleteIsv({{$isv}})">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{$isv->id}}</td>
                            <td>{{$isv->Descripcion}}</td> 
                            <td>{{$isv->isv}}</td>        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
              
    @endsection

    <!-- librerias -->
@push('styles')
    <link rel="stylesheet" href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" >
@endpush  
@push('scripts')
    <script src="{{asset('/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- funcion editCategoria para pasar parametros y editar-->
    <script>    
        function editIsv(isv){
            $("#editIsvForm").attr('action',`/isv/${isv.id}`);
            $("#editIsvForm #Descripcion").val(isv.Descripcion); 
            $("#editIsvForm #isv").val(isv.isv);
        } 
    </script>

    <!--DELETE -->
    <script>    
        function deleteIsv(isv){
        $("#deleteIsvFrm").attr('action',`/isv/${isv.id}`);      
    } 
    </script>
    
  
    
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


