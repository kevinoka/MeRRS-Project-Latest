<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('APP_NAME', 'Meeting Room Reservation System') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link href={{asset('plugins/fontawesome-free/css/all.min.css')}} rel='stylesheet' />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- iCheck -->
  <link href={{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} rel='stylesheet' />

  <!-- JQVMap -->
  <link href={{asset('plugins/jqvmap/jqvmap.min.css')}} rel='stylesheet' />

  <!-- Theme style -->
  <link href={{asset('dist/css/adminlte.min.css')}} rel='stylesheet' />

  <!-- overlayScrollbars -->
  <link href={{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}} rel='stylesheet' />

  <!-- summernote -->
  <link href={{asset('plugins/summernote/summernote-bs4.css')}} rel='stylesheet' />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Bootstrap 4 and  Tempus Dominus -->

  <link href={{asset('css/style.css')}} rel='stylesheet' />


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li>
        <a class="nav-link" style="cursor: context-menu;">Meeting Room Reservation System </a>
      </li>
    </ul>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hello, {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i>&nbsp;
                            {{ __('Logout') }}
                        </a>

{{--                        <a class="dropdown-item" href="#"--}}
{{--                           onclick=""><i class="fa fa-user fa-fw"></i>&nbsp;--}}
{{--                            {{ __('My Profile') }}--}}
{{--                        </a>--}}

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('member.dashboard.index') }}" class="brand-link">
        <img src="{{asset('img/idxsti-logo-icon.png')}}" alt="IDXSTI Logo" class="brand-image img-circle elevation-3"
             style="opacity: .9; background-color: #FFFFFF; padding: 0.06em;">
      <span class="brand-text">&nbspIDXSTI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('member.dashboard.index') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('member.requestpage.index') }}" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Request
              </p>
            </a>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <b>Copyright &copy; 2019 <a href="http://idxsti.co.id">IDXSTI</a>.</b>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- JS and CSS for Datatable -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  </body>

  <script>
      $('#editModal').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget) // Button that triggered the modal
          var start = button.data('mystart') // Extract info from data-* attributes
          var end = button.data('myend')
          var title = button.data('mytitle')
          var room = button.data('myroom')
          var personNum = button.data('mypersonnum')
          var frequency = button.data('myfrequency')
          var description = button.data('mydescription')
          var requestedBy = button.data('myrequestedby')

          var modal = $(this)

          modal.find('.modal-body #start').val(start);
          modal.find('.modal-body #end').val(end);
          modal.find('.modal-body #timeFrom').val(timeFrom);
          modal.find('.modal-body #timeEnd').val(timeEnd);
          modal.find('.modal-body #title').val(title);
          modal.find('.modal-body #room').val(room);
          modal.find('.modal-body #personNum').val(personNum);
          modal.find('.modal-body #frequency').val(frequency);
          modal.find('.modal-body #description').val(description);
          modal.find('.modal-body #requestedBy').val(requestedBy);
      })
  </script>

</html>
