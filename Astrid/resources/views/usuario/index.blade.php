@extends ('layouts.admin')
@section ('contenido')

@include('mensajes.mensajes')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios <a href="{{url('/usuario/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('usuario.search')
	</div>
</div><br></br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Avatar</th>
					<th>User Name</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>
               @foreach ($users as $user)
				<tr>
					<td>{{ $user->id}}</td>
					<td>
					    <img src="{{asset('img/users/'.$user->avatar)}}" alt="{{$user->username}}" height="80px" width="80px" class="img-thumbnail">
					</td>
					<td>{{ $user->username}}</td>
					<td>{{ $user->nombre}}</td>
					<td>{{ $user->telefono}}</td>
					<td>{{ $user->email}}</td>
					<td>
						<a href="{{URL::action('UserController@edit',$user->id)}}"><button class="btn-xs btn-info">Editar</button></a>
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal"><button class="btn-xs btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('usuario.modal')
				@endforeach
			</table>
		</div>
		{{$users->render()}}
	</div>
</div>

@endsection