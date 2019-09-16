<html lang="en" style="height: auto;"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SAI | Sistema Automatizado de Inscripcion</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('local_css')
  <script src="{{ asset('js/app.js') }}" defer></script>

  @yield('local_js')

</head>
<body class="sidebar-mini sidebar-open" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
	        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	            {{ Auth::user()->nombre }} <span class="caret"></span>
	        </a>

	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	            <a class="dropdown-item" href="{{ route('logout') }}"
	               onclick="event.preventDefault();
	                             document.getElementById('logout-form').submit();">
	                {{ __('Logout') }}
	            </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
	        </div>
	    </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 742.066px;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="AdminLTE3v/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Informacion Personal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="/personas" class="nav-link">
              <i class="nav-icon fa fa-street-view"></i>
              <p>
                Datos de Personas
                
              </p>
            </a>
            <a href="/profesores" class="nav-link">
              <i class="nav-icon fa fa-caret-right"></i>
              <p>
                Datos de profesores
                
              </p>
            </a>
            <a href="/representantes" class="nav-link">
              <i class="nav-icon fa fa-caret-right"></i>
              <p>
                Datos de representantes
                
              </p>
            </a>
            <a href="/alumnos" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Datos de alumnos
                
              </p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Registros de Inscripciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="/personas" class="nav-link">
              <i class="nav-icon fa fa-caret-right"></i>
              <p>
                Inscripciones
                
              </p>
            </a>
            <a href="/secciones" class="nav-link">
              <i class="nav-icon fa fa-caret-right"></i>
              <p>
                Secciones
                
              </p>
            </a>
            <a href="/periodos" class="nav-link">
              <i class="nav-icon fa fa-caret-right"></i>
              <p>
                Periodos
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 742.066px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
{{--             <h1 class="m-0 text-dark">Starter Page</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
{{--               <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          @yield('content')
          
          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2014-2018 <a href="https://adminlte.io">SAI</a>.</strong> All rights reserved.
  </footer>
<div id="sidebar-overlay"></div></div>
<!-- ./wrapper -->




</body></html>