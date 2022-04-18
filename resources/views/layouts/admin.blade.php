<!--tampilan layout admin agar dinamis-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!--smartwizard-->
  <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
  <style>
    .link > a {
      text-decoration: none; 
      color: white;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 link position-fixed">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link">
       <img src="{{asset('gambar/LogoDisnakerperin.png')}}" width="20" height="30">
      <span class="brand-text font-weight-light">DISNAKERPERIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template')}}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info link">
          <a href="/admin/home" class="d-block">{{Auth::user()->name}}</a> <!--memanggil nama admin yang sedang login-->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="/dataStatistik" class="nav-link">   <!--merefer ke menu data statistik milik admin (views->statistikAdmin.blade.php)-->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Statistik
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="/dataPerusahaan" class="nav-link"> <!--merefer ke menu data milik admin (views->dataAdmin.blade.php)-->
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data
              </p>
            </a>
          </li>
           <li class="nav-item">
           <a href="/verifikasiperusahaan" class="nav-link"> <!--merefer ke menu status verifikasi milik admin (views->verifikasiAdmin.blade.php-->
             <i class="nav-icon fas fa-table"></i>
              <p>
                Status Verifikasi
              </p>
            </a>
          </li>
            <br><br>
           <center>
               <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </center>
       </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   </aside>
  <main>
    @yield('content') <!--menampilkan tag html yang berada di dalam @section('content')-->
  </main>
  <!-- jQuery -->
  <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Axios -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('template')}}/dist/js/demo.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

   <script>
  $(document).ready(function(){
   
   // SmartWizard initialize
   $('#smartwizard').smartWizard({
      theme: 'arrows', //tema smart wizard 
      toolbarSettings: {
      showNextButton: false, // show/hide a Next button
      showPreviousButton: false, // show/hide a Previous button
      }
    });
  });
  </script>

  @yield('script')  <!--menampilkan tag html yang berada di dalam @section('script')-->

</body>
</html>