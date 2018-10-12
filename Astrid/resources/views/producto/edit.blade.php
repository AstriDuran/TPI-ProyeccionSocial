@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $producto->nombre}}</h3>
      </div>
   </div>
   @include('mensajes.errores')

   {!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idproducto],'files'=>'true'])!!}
      {{Form::token()}}

         <div class="form-group">
            <label for="foto"> Foto Producto </label>
            <input type="file" name="foto" class="form-control">
               @if(($producto->foto)!=" ")
                  <img class="img-thumbnail" src="{{asset('img/productos/'.$producto->foto)}}" alt="{{$producto->nombreproducto}}" height="110px" width="110px">
               @endif
         </div>
         
         <div class="form-group">
         	<label for="codigo">Codigo</label>
         	<input type="text" name="codigo" class="form-control" value="{{$producto->codigo}}" placeholder="codigo...">
         </div>
         <div class="form-group">
         	<label for="nombre">Nombre</label>
         	<input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" placeholder="Nombre...">
         </div>
         <div class="form-group">
           <label for="detalles">Detalles</label>
           <input type="text" name="detalles" class="form-control" value="{{$producto->detalles}}" placeholder="Detalles...">
         </div>
         <div class="form-group">
         	<label for="descripcion">Descripción</label>
         	<input type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}" placeholder="Descripción...">
         </div>
         <div class="form-group">
            <label> Categoria</label>
            <select name="idcategoria" required  class="form-control">
               <option value="">Seleccionar Categoria...</option>
               	@foreach ($categorias as $cat)
               	   @if ($cat->idcategoria==$producto->idcategoria)
               	   		<option value="{{$cat->idcategoria}}" selected>{{$cat->categoria}}</option>
               	   @else
               	   		<option value="{{$cat->idcategoria}}">{{$cat->categoria}}</option>
               	   @endif
               	@endforeach
            </select>     
      	</div>
      	<div class="form-group">
         	<label for="precio">Precio</label>
         	<input type="text" name="precio" class="form-control" value="{{$producto->precio}}" placeholder="Precio Producto...">
         </div>
         <div class="form-group">
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
            <a href="{{url('/producto')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
         </div>

	{!!Form::close()!!}		

@endsection