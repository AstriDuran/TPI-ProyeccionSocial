@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Nuevo Cliente</h3>
    </div>
  </div>
  @include('mensajes.errores') 

	{!!Form::open(array('url'=>'usuario','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

    <div class="row">
      <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
           
            <div class="form-group">
              <label ffor="foto" class="col-md-5 control-label"> Avatar </label>
                <input type="file" class="form-control" name="foto"  >
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="username" class="col-md-5 control-label">Nombre de Usuario</label>
                <input id="username" type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="User Name...">
            </div>

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="nombre" class="col-md-5 control-label">Nombre</label>
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{old('nombre')}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
              <label for="apellido" class="col-md-5 control-label">Apellido</label>
                <input id="apellido" type="text" class="form-control" name="apellido" value="{{old('apellido')}}"  placeholder="Apellido...">
            </div>

            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
              <label for="telefono" class="col-md-5 control-label">Telefono</label>
                <input id="telefono" type="text" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Telefono...">
            </div>
        </div>

        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">

            

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-5 control-label" >Email</label>
                <input type="text" name="email"  value="{{old('email')}}" class="form-control" placeholder="Email...">
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-5 control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-5 control-label">Confirmar Password</label>

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
    </div> 

            
	{!!Form::close()!!}		
     
@endsection