@extends ('layouts.admin')
@section ('contenido')

@include('mensajes.mensajes')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ofertas <a href="{{url('/oferta/create')}}"><button class="btn btn-success">Nueva</button></a></h3>
		@include('oferta.search')
	</div>
</div><br></br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Codigo Producto</th>
					<th>Nombre Producto</th>
					<th>Descuento</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ofertas as $of)
				<tr>
					<td>{{ $of->idoferta}}</td>
					<td>{{ $of->codigo}}</td>
					<td>{{ $of->producto}}</td>
					<td>{{ $of->descuento}}</td>
					<td>{{ $of->descripcion}}</td>
					
					@if($of->estado=='1')
                       <td><p style="color:#239B56";>Publicada</p></td>
                      @else
                         @if($of->estado=='0')
                           <td><p style="color:red;">No publicada</p></td>
                         @endif   
                    @endif
					<td>
						<a href="{{URL::action('OfertaController@edit',$of->idoferta)}}"><button class="btn-xs btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$of->idoferta}}" data-toggle="modal"><button class="btn-xs btn-danger">Eliminar</button></a>
                         <a href="{{URL::action('OfertaController@estado',$of->idoferta)}}"><button class="btn-xs btn-success">Estado</button></a>
					</td>
				</tr>
				@include('oferta.modal')
				@endforeach
			</table>
		</div>
		{{$ofertas->render()}}
	</div>
</div>

@endsection