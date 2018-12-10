<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INVBienes | www.invbienes.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->

    <link href="{{ URL::asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ URL::asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Theme style -->

    <link href="{{ URL::asset('css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ URL::asset('css/_all-skins.min.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{ URL::asset('img/apple-touch-icon.png') }}" rel="stylesheet" type="logo"/>


    <link href="{{ URL::asset('img/favicon.ico') }}"  type="logo"/>


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>IN</b>V</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>INVBienes</b></span>
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
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">&nbsp&nbsp{{ Auth::user()->name }}</span>
                </a>
                                               <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
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
                <i class="fa fa-laptop"></i>
                <span>Inventario</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/inventariobienes"><i class="fa fa-circle-o"></i> Bienes muebles</a></li>
                <li><a href="/inventarioespecies"><i class="fa fa-circle-o"></i> Especies</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Altas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/invespecies"><i class="fa fa-circle-o"></i> Nueva alta</a></li>
                <li><a href="/proveedoresespecie"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-exchange"></i>
                <span>Movimientos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/traslados/trasladobien"><i class="fa fa-circle-o"></i> Traslado</a></li>
                <li><a href="/bajas/bajabien"><i class="fa fa-circle-o"></i> Dar de baja</a></li>
              </ul>
            </li>


            @if (auth()->user()->role == 0)           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Administracion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="/grupos"><i class="fa fa-circle-o"></i> Grupos</a></li>
                <li><a href="/subgrupos"><i class="fa fa-circle-o"></i> Subgrupos</a></li>
                <li><a href="/especies"><i class="fa fa-circle-o"></i> Especies</a></li>
                <li><a href="/ubicaciones"><i class="fa fa-circle-o"></i> Ubicaciones</a></li>
                
              </ul>
            </li>
            @endif
            
             <li>
                <li><a href="/generarplaqueta"><i class="fa fa-print" aria-hidden="true"></i> <span>Generar plaqueta</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
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
                  <h3 class="box-title">Sistema de Inventario</h3>
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
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->



    @yield('scripts')
    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('js/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="{{ URL::asset('js/app.min.js') }}" type="text/javascript"></script>



  </body>
</html>
