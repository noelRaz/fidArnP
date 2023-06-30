<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('tableBord/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('tableBord/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('tableBord/plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link href="{{ asset('tableBord/dist/css/adminlte.css') }}" rel="stylesheet">
  <script src="{{ asset('js/components/app.js')}}"></script>
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{ asset('js/qrCode.js')}}"></script>
  <script src="{{ asset('js/html2canvas.js')}}"></script>
  <script src="{{ asset('js/boostrap-toggle.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <!-- Authentification Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown">
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button :href="route('logout')" class="dropdown-item" onclick="return confirm('Voulez-vous vraiment déconnecter'); event.preventDefault(); this.closest('form').submit();">
              <i class="fas fa-loggout mr-2"></i>{{ __('Déconnexion') }}
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <?php if(Auth::user()->role == '1') {?>
  @include('layouts.navigation')
  <?php }
        else {
            echo '';
        } ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('sweetalert::alert')
<!-- jQuery -->
<script src="{{asset('tableBord/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('tableBord/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('tableBord/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('tableBord/dist/js/demo.js')}}"></script>
<script src="{{ asset('js/qrCode.js')}}"></script>
<script src="{{ asset('js/boostrap-toggle.min.js') }}"></script>
</body>
</html>
