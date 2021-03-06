@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Categoría</h3>
    </div>
  </div>
  @include('mensajes.errores')
			
{!!Form::open(array('url'=>'/categoria','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
      {{csrf_field()}}
        
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" class="form-control" placeholder="Nombre...">
        </div>
        
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
        </div>
        
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
            <div class="form-group">
              <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
              <a href="{{url('categoria')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
            </div>
          </div>
        </div>

  {!!Form::close()!!} 
		         
@endsection