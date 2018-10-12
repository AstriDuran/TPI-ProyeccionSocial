@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
		</div>
  </div>
  @include('mensajes.errores')

	{!!Form::open(array('url'=>'/producto','method'=>'POST','autocomplete'=>'off','files'=>true, 'id' => 'my-dropzone'))!!}
    {{Form::token()}}
            
      <div class="form-group">
        <label for="foto"> Foto Producto </label>
        <input type="file"  class="form-control" name="foto"  >
      </div>

      <div class="form-group">
      	<label for="codigo">Codigo</label>
      	<input type="text" name="codigo" class="form-control" value="{{old('codigo')}}" placeholder="codigo...">
      </div>

      <div class="form-group">
      	<label for="nombre">Nombre</label>
      	<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre...">
      </div>

      <div class="form-group">
        <label for="detalles">Detalles</label>
        <input type="text" name="detalles" class="form-control" value="{{old('detalles')}}" placeholder="Detalles...">
      </div>

      <div class="form-group">
      	<label for="descripcion">Descripción</label>
      	<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción...">
      </div>

      <div class="form-group">
         <label> Categoria</label>
         <select name="idcategoria" required  class="form-control">
            <option value="">Seleccionar Categoria...</option>
             @foreach ($categorias as $cat)
                   <option value="{{$cat->idcategoria}}">{{$cat->categoria}}</option>
             @endforeach
         </select>     
   	  </div>

   	  <div class="form-group">
      	<label for="precio">Precio</label>
      	<input type="text" name="precio" class="form-control" value="{{old('precio')}}" placeholder="Precio Producto...">
      </div>
     
     <div class="form-group">
        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
        <a href="{{url('/producto')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
     </div>

	{!!Form::close()!!}		
            
@endsection