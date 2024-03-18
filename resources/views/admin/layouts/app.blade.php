<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Anti Corruption Bureau Maharashtra | Administrative Section</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
  .user-panel img {
    height: auto;
    width: 1.8rem;
}
.content-wrapper>.content {
    padding: 0.5rem 0.5rem;
}
.required::after {
    content: " *";
    color: red;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  @foreach (session('flash_notification', collect())->toArray() as $message)
  <script type="text/javascript">
      $(document).on('ready', function() {
          showAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
      });

  </script>
@endforeach
@if(session()->has('flash_notification.message'))
<div class="alert alert-{{ session('flash_notification.level') }}">
    {{ session('flash_notification.message') }}
</div>
@endif
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
        
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        {{-- <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false"> --}}
          <div class="user-panel d-flex nav-link" data-toggle="dropdown" href="#" aria-expanded="false" style="cursor: pointer;">
            <div class="image">
              <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            {{-- <div class="info">
              <a href="javascript:" class="d-block">{{ \Auth::user()->name }}</a>
            </div> --}}
          </div>
        {{-- </a> --}}
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">Welcome , {{ \Auth::user()->name }}</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i>My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cogs mr-2"></i> Change Password
          </a>
          
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
        <button class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>
          {{-- <p> --}}
            Logout
            {{-- <span class="right badge badge-danger">New</span> --}}
          {{-- </p> --}}
        </button>
    </form>
          {{-- <a href="#" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a> --}}
        </div>
      </li>
      
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACB Maharastra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ \Auth::user()->role_id==1?route('admin.dashboard'):(\Auth::user()->role_id==2?route('state.dashboard'):(\Auth::user()->role_id==3?route('range.dashboard'):route('unit.dashboard'))) }}" class="nav-link active  bg-info">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}
          @if(Auth::user()->role_id==1 || Auth::user()->role_id==2 )
          <li class="nav-item {{ areActiveRoutesMenu(['user_list', 'add_user','range_list','unit_list','add_user','add_range','add_unit'])}}">
            <a href="javascript:" class="nav-link {{ areActiveRoutes(['user_list', 'add_user','range_list','unit_list','add_user','add_range','add_unit'])}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user_list') }}" class="nav-link {{ areActiveRoutes(['user_list','add_user'])}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('range_list') }}" class="nav-link {{ areActiveRoutes(['range_list','add_range'])}}">
                    <i class="fas fa-address-card nav-icon"></i>
                  <p>Range List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('unit_list') }}" class="nav-link {{ areActiveRoutes(['unit_list','add_unit'])}}">
                    <i class="fas fa-address-card nav-icon"></i>
                  <p>Unit List</p>
                </a>
              </li>
              
            </ul>
          </li>
          @endif
          <li class="nav-item">
          <a href="{{ route('pr_list') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Press Release
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li> 
        <li class="nav-item">
        <a href="{{ route('fir_list') }}" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
            FIR
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li> 
      <li class="nav-item">
      <a href="{{ route('stat_list') }}" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>
          Statistics
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li> 
    <li class="nav-item">
    <a href="{{ route('legal_list') }}" class="nav-link">
      <i class="nav-icon fas fa-list"></i>
      <p>
        Legal
        <span class="right badge badge-danger">New</span>
      </p>
    </a>
  </li> 
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@yield('content')
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="https://acbmaharashtra.gov.in/">ANTI-CORRUPTION BUREAU, MAHARASHTRA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- jquery-validation -->
<script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- ChartJS -->
<script src=".{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('admin/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
@yield('script')
<script>
 function confirmDelete(event) {
                event.preventDefault();
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });
            }
</script>
</body>
</html>
