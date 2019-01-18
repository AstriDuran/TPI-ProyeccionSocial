<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name','Laravel') }} | @yield('title','Hola ')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!-- Bootstrap-select 1.12.2 -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/estilos.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin/css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

  </head>

  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

          <!-- Logo -->
          <a href="{{url('/')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><i class="fa fa-plus-square"></i></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><h4>{{ config('app.name','Laravel') }}</h4></span>
          </a>

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      
                      <!-- User name -->
                      <span class="hidden-xs"> {{Auth::user()->username}} </span>
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <p> Productos Diversos </p>
                        <img src="{{asset('img/users/'.Auth::user()->avatar)}}" alt="{{Auth::user()->username}}"  class="img-thumbnail">
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                          <div class="center-block">
                            <a href="{{ url('admin/logout') }}" class="btn btn-default btn-block" 
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-btn fa-sign-out"></i> Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>

          </nav>
        </header>


        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
                      
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header"></li>

               <li>
                 <a href="{{route('inicio')}}">
                   <i class="fa fa-info-circle"></i> <span>Inicio</span>
                   <small class="label pull-right bg-yellow">IT</small>
                 </a>
               </li>

                <li>
                 <a href="{{route('shop.index')}}">
                   <i class="fa fa-info-circle"></i> <span>Productos</span>
                   <small class="label pull-right bg-yellow">IT</small>
                 </a>
               </li>
              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-laptop"></i>
                  <span>Pedidos</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('usuario.pedido',Auth::user()->id)}}"><i class="fa fa-circle-o"></i>Ver Pedidos</a></li>
                </ul>
              </li>
              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Perfil Usuario</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('perfil.show',Auth::user()->id)}}"><i class="fa fa-circle-o"></i>Ver Datos</a></li>
                  <li><a href="{{route('perfil.edit',Auth::user()->id)}}"><i class="fa fa-circle-o"></i> Editar Datos</a></li>
                  <li><a href="{{route('usuario.password',Auth::user()->id)}}"><i class="fa fa-circle-o"></i> Cambiar Contraseña</a></li>
                </ul>
              </li>
                          
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

        <!--Contenido-->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="box">
                  
                        <div class="box-header with-border">
                          <h3 class="box-title">Panel de Usuario</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                    	    <div class="row">
  	                  	      <div class="col-md-12">
  		                          <!--Contenido-->
                                @yield('contenido')
  		                          <!--Fin Contenido-->
                              </div>
                          </div>
  		                  </div>
                        <!-- /.box-body -->

                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <!--Fin-Contenido-->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.0
            </div>
            <strong>Copyright &copy; 2018-2022 <a href="https://sites.google.com/ues.edu.sv/liv3theart/contactanos"> {{ config('app.name','Laravel') }} </a> . </strong> All rights reserved.
        </footer>

    </div>
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('admin/js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
     <!-- Bootstrap-select 1.12.2 -->
     <script src="{{asset('admin/js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/js/app.min.js')}}"></script>
    
  </body>
</html>
