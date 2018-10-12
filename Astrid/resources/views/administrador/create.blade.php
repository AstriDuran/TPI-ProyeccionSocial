@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
			<h3>Nuevo Administrador</h3>
      </div>
  </div>
  @include('mensajes.errores')

	{!!Form::open(array('url'=>'/administrador','method'=>'POST','autocomplete'=>'off','files'=>true, 'id' => 'my-dropzone'))!!}
  {{Form::token()}}     
 
  <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

        <div class="form-group">
          <label ffor="foto" class="col-md-4 control-label"> Avatar </label>
          <input type="file"  class="form-control" name="foto"  >
        </div>

        <div class="form-group{{ $errors->has('name') ? ' has-error ' : '' }}">
            <label for="name" class="col-md-4 control-label">Nombre</label>

                <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nombre...">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
            <label for="telefono" class="col-md-4 control-label">Telefono</label>
                <input id="telefono" type="text" class="form-control" name="telefono" value="{{old('telefono')}}" placeholder="Telefono...">
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label" >Email</label>
              <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>

                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

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