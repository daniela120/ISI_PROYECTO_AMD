<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Isv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
    <form action="{{ url('/isv') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="Descripcion" class="form-fields"> Descripcion</label>
                            <input type="text" class="form-control {{$errors->has('Descripcion') ? 'is-invalid' : '' }}"
                             rows="3" name="Descripcion" id="Descripcion"
                            value="{{old('Descripcion')}}" placeholder='Primer letra en Mayuscula'>
                            @if ($errors->has('Descripcion'))
                                    <span class="text-danger">{{ $errors->first('Descripcion') }}</span>
                            @endif
                            
                        </div>
                    </div>

                    <div class="col-lg-12 form-group">
                        <div>
                            <label for="isv" class="form-fields"> Isv</label>
                            <input type="text" class="form-control {{$errors->has('isv') ? 'is-invalid' : '' }}"
                             rows="3" name="isv" id="isv"
                            value="{{old('isv')}}" placeholder=''>
                            @if ($errors->has('isv'))
                                    <span class="text-danger">{{ $errors->first('isv') }}</span>
                            @endif
                            
                        </div>
                    </div>
                </div>
                
                <div class="buttons-form-submit d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                    <button type="submit" href="#" class="btn btn-primary">
                                Guardar
                                <i class="fas fa-spinner fa-spin d-none"></i>
                    </button>
                 </div>
            </form>
         </div>
        </div>
    </div>
</div>
