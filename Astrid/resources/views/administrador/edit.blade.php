@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Datos: {{ $admin->name}}</h3>
    </div>
  </div>
  @include('mensajes.errores')

	{!!Form::model($admin,['method'=>'PATCH','route'=>['administrador.update',$admin->id],'files'=>'true'])!!}
  {!! Form::hidden('id', $admin->id) !!}
   {{Form::token()}}

      <div class="row">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

            <div class="form-group">
               <label for="avatar"> Avatar </label>
               <input type="file" name="avatar" class="form-control">
                  @if(($admin->avatar)!=" ")
                     <img class="img-thumbnail" src="{{asset('img/admins/'.$admin->avatar)}}" alt="{{$admin->name}}" height="110px" width="110px">
                  @endif
            </div>

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$admin->name}}" placeholder="Nombre...">
            </div>

            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                <label for="telefono" class="col-md-4 control-label">Teléfono</label>
                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{$admin->telefono}}" placeholder="Telefono...">
            </div>

            <div class="form-group">
              <label for="active">Estado </label>
              <select name="active" id="active" class="form-control">
                @if($admin->active==1)
                  <option value="1" selected>Activo</option>
                  <option value="0">Inactivo</option>
                      @else
                      <option value="1">Activo</option>
                      <option value="0" selected>Inactivo</option>
                @endif
              </select>     
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="col-md-4 control-label" >Email</label>
                  <input type="text" name="email" value="{{$admin->email}}" class="form-control">
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
               <a href="{{url('/administrador')}}" class="btn btn-danger" role="button"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</a>
            </div>

         </div>

      </div> 

	{!!Form::close()!!}		      
	
@endsection