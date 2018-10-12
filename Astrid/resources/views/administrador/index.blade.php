@extends ('layouts.admin')
@section ('contenido')

@include('mensajes.mensajes')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Administradores - <a href="{{url('/administrador/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('administrador.search')
	</div>
</div><br></br>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Avatar</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
               @foreach ($admins as $adm)
				<tr>
					<td>{{ $adm->id}}</td>
					<td>
					    <img src="{{asset('img/admins/'.$adm->avatar)}}" alt="{{$adm->name}}" height="80px" width="80px" class="img-thumbnail">
					</td>
					<td>{{ $adm->name}}</td>
					<td>{{ $adm->telefono}}</td>
					<td>{{ $adm->email}}</td>
					@if($adm->active=='1')
                       <td><p style="color:#239B56";>Activo</p></td>
                      @else
                         @if($adm->active=='0')
                           <td><p style="color:red;">Inactivo</p></td>
                         @endif   
                    @endif
					<td>
						<a href="{{URL::action('AdminController@edit',$adm->id)}}"><button class="btn-xs btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$adm->id}}" data-toggle="modal"><button class="btn-xs btn-danger">Eliminar</button></a>
                        <a href="{{URL::action('AdminController@estado',$adm->id)}}"><button class="btn-xs btn-success">Estado</button></a>
					</td>
				</tr>
				@include('administrador.modal')
				@endforeach
			</table>
		</div>
		{{$admins->render()}}
	</div>
</div>

@endsection