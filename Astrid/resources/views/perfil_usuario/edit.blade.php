@extends('layouts.user')
@section('title', 'Perfil User')
@section('contenido')


    <div class="form-horizontal col-md-4 col-md-offset-4">
         <h2>Editar Usuario <b> : {{$user->username}} </b></h2> 
    </div>

    <div class="form-horizontal col-md-12"><br>
      <div class="panel panel-primary">
        <div class="panel-heading" style="background: black" ><b> Datos Personales... </b></div>
          <div class="panel-body">
            <div class="col-md-12"> 
              <br>

            {!!Form::model($user,['method'=>'PATCH','route'=>['perfil.update',$user->id]])!!}
            {!! Form::hidden('id', $user->id) !!}
            {{Form::token()}}

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}"> 
                      <label for="avatar" class="col-md-3 control-label">Avatar </label>

                      <div class="col-md-8">
                          <input id="avatar" type="file" class="form-control" name="avatar" value="{{$user->avatar}}">

                          @if(($user->avatar)!=" ")
                             <img class="img-thumbnail" src="{{asset('img/users/'.$user->avatar)}}" alt="{{$user->username}}" height="110px" width="110px">
                          @endif

                          @if ($errors->has('avatar'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('avatar') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <label for="username" class="col-md-3 control-label">User Name </label>

                      <div class="col-md-8">
                          <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" placeholder=" ">

                          @if ($errors->has('username'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('username') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}"> 
                      <label for="password" class="col-md-3 control-label">Nombre</label>

                      <div class="col-md-8">
                          <input id="nombre" type="text" class="form-control" name="nombre" value="{{$user->nombre}}">

                          @if ($errors->has('nombre'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('nombre') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

         <!--       <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                     <label for="direccion" class="col-md-3 control-label">Direccion</label>

                     <div class="col-md-8">
                        <textarea id="direccion" type="text-area" class="form-control" name="direccion" rows="3">{{$user->direccion}}</textarea>

                         @if ($errors->has('direccion'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('direccion') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>
            -->   
                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    <label for="apellido" class="col-md-3 control-label">Apellido</label>

                    <div class="col-md-8">
                        <input id="apellido" type="text" class="form-control" name="apellido" value="{{$user->apellido}}">

                        @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                 <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                     <label for="telefono" class="col-md-3 control-label">Telefono</label>

                     <div class="col-md-8">
                         <input id="telefono" type="text" class="form-control" name="telefono" value="{{$user->telefono}}">

                         @if ($errors->has('telefono'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('telefono') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-3 control-label">E-Mail </label>

                     <div class="col-md-8">
                         <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}">

                         @if ($errors->has('email'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('email') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                     <label for="password" class="col-md-3 control-label">Password</label>

                     <div class="col-md-8">
                         <input id="password" type="password" class="form-control" name="password">

                         @if ($errors->has('password'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('password') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                     <label for="password-confirm" class="col-md-3 control-label">Confirmar Password</label>

                     <div class="col-md-8">
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                         @if ($errors->has('password_confirmation'))
                             <span class="help-block">
                                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

              </div>
        
              <div class="form-group">
                  <div class="col-md-4 col-md-offset-4"><br>
                      <div class="col-md-5 col-md-offset-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-user"></i> Guardar
                          </button>
                      </div>
                      <div class="col-md-6">
                          <a href="{{url('usuario/perfil/'.$user->id)}}" class="btn btn-danger" role="button">
                          <i class="fa fa-btn fa-times"></i> Cancelar</a>
                      </div>
                  </div>
              </div>
            {!!Form::close()!!} 

          </div>
        </div>
      </div>
    </div>

@endsection
