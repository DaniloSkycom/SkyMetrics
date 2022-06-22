<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>@yield('title') | SkyMetrics </title>
    <link rel="apple-touch-icon" href="{{asset("assets/images/ico/apple-icon-120.html")}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/images/ico/favicon.ico")}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/vendors/css/vendors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/vendors/css/charts/apexcharts.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/vendors/css/extensions/toastr.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/vendors/css/extensions/sweetalert2.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/vendors/css/forms/select/select2.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bootstrap-extended.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/colors.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/components.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/dark-layout.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/bordered-layout.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/themes/semi-dark-layout.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/core/menu/menu-types/vertical-menu.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/plugins/charts/chart-apex.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/plugins/extensions/ext-component-toastr.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/pages/app-invoice-list.min.css")}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/style.css")}}">
    @yield('css')
  </head>
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
          </li>
          <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name fw-bolder">{{Auth::user()->name}}</span>
                <span class="user-status">{{getNameRol(Auth::user()->rol_id)}}</span>
              </div>
              <span class="avatar">
                <img class="round" src="{{asset(Auth::user()->avatar)}}" alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
              <a class="dropdown-item" href="{{url('admin/mi-cuenta')}}"><i class="me-50" data-feather="user"></i> Mi Cuenta</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="me-50" data-feather="power"></i> Cerrar Sesión</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto">
            <a class="navbar-brand" href="index.html">
              <img src="{{asset('logo.png')}}" alt="" style="width: 100%;margin-top: -19px;">
            </a>
          </li>
          <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
              <img src="{{asset('logo.png')}}" alt="" style="width: 100%;margin-top: -19px;">
            </a>
          </li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        @switch(Auth::user()->rol_id)
            @case(1)
                @include('menu.admin')        
                @break
            @case(2)
                @include('menu.usuario')
                @break
            @default
                No hay rol asignado
        @endswitch
        
      </div>
    </div>
    <!-- END: Main Menu-->

    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
      </div>
    </div>
    
</div>

    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <script src="{{asset("assets/vendors/js/vendors.min.js")}}"></script>
    {{-- <script src="{{asset("assets/vendors/js/charts/apexcharts.min.js")}}"></script> --}}
    <script src="{{asset("assets/vendors/js/extensions/toastr.min.js")}}"></script>
    <script src="{{asset("assets/vendors/js/extensions/moment.min.js")}}"></script>
    <script src="{{asset("assets/vendors/js/extensions/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("assets/vendors/js/forms/select/select2.full.min.js")}}"></script>
    <script src="{{asset("assets/js/core/app-menu.min.js")}}"></script>
    <script src="{{asset("assets/js/core/app.min.js")}}"></script>
    <script src="{{asset("assets/js/scripts/customizer.min.js")}}"></script>
    {{-- <script src="{{asset("assets/js/scripts/pages/dashboard-analytics.min.js")}}"></script> --}}
    <script src="{{asset("assets/js/scripts/pages/app-invoice-list.min.js")}}"></script>
    <script src="{{asset("assets/js/setting.js?v=".rand(0,1000))}}"></script>
    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
    @yield('js')
  </body>
</html>