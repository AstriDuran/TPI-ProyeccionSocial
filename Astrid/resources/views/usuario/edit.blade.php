@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Datos: {{ $user->username}}</h3>
    </div>
  </div>
  @include('mensajes.errores')
	
  {!!Form::model($user,['method'=>'PATCH','route'=>['usuario.update',$user->id]])!!}
    {!! Form::hidden('id', $user->id) !!}
    {{Form::token()}}

      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group">
              <label for="avatar"> Avatar </label>
                <input type="file" name="avatar" class="form-control">
                  @if(($user->avatar)!=" ")
                     <img class="img-thumbnail" src="{{asset('img/users/'.$user->avatar)}}" alt="{{$user->username}}" height="110px" width="110px">
                  @endif
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username" class="col-md-4 control-label">Nombre de Usuario</label>
                <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" placeholder="User Name...">
            </div>

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombre" class="col-md-4 control-label"> Nombre</label>
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{$user->nombre}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
              <label for="apellido" class="col-md-4 control-label">Apellido</label>
                <input type="text" name="apellido" value="{{$user->apellido}}" class="form-control" placeholder="Apellido...">
            </div>
             
         </div>

         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
              <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                <input id="telefono" type="text" class="form-control" name="telefono" value="{{$user->telefono}}" placeholder="Telefono...">
            </div>

            

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label" >Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email...">
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Contraseña</label>

                <input id="password" type="password" class="form-control" name="password">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
               <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
               <a href="{{url('usuario')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
            </div>

         </div>
      </div> 

	{!!Form::close()!!}		
            
@endsection