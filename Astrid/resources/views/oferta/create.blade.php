@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Oferta</h3>
		</div>
  </div>
  @include('mensajes.errores')


  {!!Form::open(array('url'=>'/oferta','method'=>'POST','autocomplete'=>'off'))!!}
  {{Form::token()}}

    <div class="form-group">
      <label for="producto"> Producto</label>
        <select name="idproducto" required  class="form-control">
           <option value="">Seleccionar producto...</option>
            @foreach ($productos as $pro)
                  <option value="{{$pro->idproducto}}">{{$pro->producto}}</option>
            @endforeach
        </select>     
    </div>

    <div class="form-group">
    	<label for="descuento"> Descuento</label>
    	<input type="number" name="descuento" max="99" min="1" class="form-control" value="{{old('descuento')}}" placeholder="(%) Descuento...">
    </div>

    <div class="form-group">
    	<label for="descripcion">Descripción</label>
    	<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción...">
    </div>
      
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
        <div class="form-group">
          <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
          <a href="{{url('/oferta')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
        </div>
      </div>
    </div>

	{!!Form::close()!!}		

@endsection