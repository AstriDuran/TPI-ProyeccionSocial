@extends('layouts.user')
@section('title', 'Perfil User')
@section('contenido')


  <div class="form-horizontal col-md-4 col-md-offset-4">
         <h2><b> Perfil de Usuario : {{$user->username}} </b></h2> 
    </div>
    <div class="form-horizontal col-md-12"><br>
      <div class="panel panel-primary">
        <div class="panel-heading" style="background: black" ><b> Datos personales. </b></div>
          <div class="panel-body">
            <div class="col-md-12">
              
              @if (Session::has('store'))
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="alert alert-success" role='alert'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                      <strong class="col-md-offset-3">{{Session::get('store')}}</strong>
                    </div>
                  </div>
                </div>
              @endif

              <br>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                      <label for="avatar" class="col-md-3 control-label">Avatar </label>

                      <div class="col-md-8">
                          @if(($user->avatar)!=" ")
                             <img class="img-thumbnail" src="{{asset('img/users/'.$user->avatar)}}" alt="{{$user->username}}" height="95px" width="95px">
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                      <label for="username" class="col-md-3 control-label">User Name </label>

                      <div class="col-md-8">
                          <input id="username" type="text" class="form-control" name="username" value="{{$user->username}}" onFocus="this.blur()">

                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}"> 
                      <label for="password" class="col-md-3 control-label">Nombre</label>

                      <div class="col-md-8">
                          <input id="nombre" type="text" class="form-control" name="nombre" value="{{$user->nombre}}" onFocus="this.blur()">

                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                      <label for="apellido" class="col-md-3 control-label">Apellido</label>

                      <div class="col-md-8">
                          <input id="apellido" type="text" class="form-control" name="apellido" value="{{$user->apellido}}" onFocus="this.blur()">
                      </div>
                  </div>

              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                     <label for="direccion" class="col-md-3 control-label">Direccion</label>

                     <div class="col-md-8">
                        <textarea id="direccion" type="text-area" class="form-control" name="direccion" rows="3" onFocus="this.blur()" >{{$user->direccion}}</textarea>
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                     <label for="telefono" class="col-md-3 control-label">Telefono</label>

                     <div class="col-md-8">
                         <input id="telefono" type="text" class="form-control" name="telefono" value="{{$user->telefono}}" onFocus="this.blur()">
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-3 control-label">E-Mail </label>

                     <div class="col-md-8">
                         <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" onFocus="this.blur()">
                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                     <label for="password" class="col-md-3 control-label">Password</label>

                     <div class="col-md-8">
                         <input id="password" type="password" class="form-control" name="password" placeholder="********" onFocus="this.blur()">
                     </div>
                 </div>

              </div>
        

              <div class="form-group">
                  <div class="col-md-4 col-md-offset-4"><br>
                      <div class="col-md-5 col-md-offset-1">
                          <a href="{{URL::action('PerfilUserController@edit',$user->id)}}">
                              <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-btn fa-edit"></i> Editar    
                              </button>
                          </a>
                      </div>
                      <div class="col-md-6">
                          <a href="{{url('/inicio')}}">
                              <button type="submit" class="btn btn-danger">
                                  <i class="fa fa-btn fa-arrow-left"></i> Inicio
                              </button>
                          </a>
                      </div>
                  </div>
              </div>

          </div>
        </div>
      </div>
    </div>

@endsection
