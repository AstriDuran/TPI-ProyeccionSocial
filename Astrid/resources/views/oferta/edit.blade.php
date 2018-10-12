@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Oferta: {{ $oferta->idoferta}}</h3>
		</div>
  </div>
  @include('mensajes.errores')

	{!!Form::model($oferta,['method'=>'PATCH','route'=>['oferta.update',$oferta->idoferta]])!!}
    {{Form::token()}}
          
      <div class="form-group">
        <label for="producto"> Producto</label>
          <select name="idproducto" required  class="form-control">
             <option value="">Seleccionar producto...</option>
              @foreach ($productos as $pro)
                 @if ($pro->idproducto==$oferta->idproducto)
                    <option value="{{$pro->idproducto}}" selected="">{{$pro->producto}}</option>
                 @else
                   <option value="{{$pro->idproducto}}">{{$pro->producto}}</option>
                 @endif
              @endforeach
          </select>     
      </div>

      <div class="form-group">
        <label for="descuento"> Descuento</label>
        <input type="text" name="descuento" class="form-control" value="{{$oferta->descuento}}" placeholder="descuento...">
      </div>

      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" class="form-control" value="{{$oferta->descripcion}}" placeholder="Descripción...">
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