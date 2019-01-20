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

  <body class="hold-transition skin-blue sidebar-mini">
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
                      <span class="hidden-xs"> {{Auth::user()->name}} </span>
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <p> Productos Diversos </p>
                        <img src="{{asset('img/admins/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}"  class="img-thumbnail">
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
              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-clone"></i>
                  <span>Categorías</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('/categoria/create')}}"><i class="fa fa-circle-o"></i> Nueva Categoría</a></li>
                  <li><a href="{{url('/categoria')}}"><i class="fa fa-circle-o"></i> Gestionar Categorías</a></li>
                </ul>
              </li>
              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-th"></i>
                  <span>Productos</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('/producto/create')}}"><i class="fa fa-circle-o"></i> Nuevo Produco</a></li>
                  <li><a href="{{url('/producto/')}}"><i class="fa fa-circle-o"></i> Gestionar Productos</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Ofertas</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('/oferta/create')}}"><i class="fa fa-circle-o"></i> Nueva Oferta</a></li>
                  <li><a href="{{url('/oferta/')}}"><i class="fa fa-circle-o"></i> Gestionar Ofertas</a></li>
                </ul>
              </li>

               <li class="treeview">
                <a href="#">
                  <i class="fa fa-plus"></i>
                  <span>Pedidos</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('/pedido')}}"><i class="fa fa-circle-o"></i> Gestionar Pedidos</a></li>
                </ul>
              </li>

               <li class="treeview">
                <a href="#">
                  <i class="fa fa-users"></i>
                  <span>Usuarios</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('/usuario/create')}}"><i class="fa fa-circle-o"></i> Nuevo Usuario</a></li>
                  <li><a href="{{url('/usuario/')}}"><i class="fa fa-circle-o"></i> Gestionar Usuarios</a></li>
                </ul>
              </li>
                         
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-user"></i> <span>Administradores</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                  <li><a href="{{url('/administrador/create')}}"><i class="fa fa-circle-o"></i> Nuevo Administrador</a></li>
                  <li><a href="{{url('/administrador')}}"><i class="fa fa-circle-o"></i> Gestionar Administradores</a></li>
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
                          <h3 class="box-title">Sistema de Gestión y Administación de Productos Diversos PRODIVE</h3>
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
