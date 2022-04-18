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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
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
    <a href="/home" class="brand-link">
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
          <a href="/home" class="d-block">{{Auth::user()->name}}</a> <!--memanggil nama admin yang sedang login-->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
            <a href="/DataStatistik" class="nav-link"> <!--merefer ke menu data statistik milik user (views->statistikUser.blade.php)-->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Statistik
              </p>
            </a>
          </li>
          <li class="nav-item">
           <a href="/DataPerusahaan" class="nav-link"> <!--merefer ke menu data milik admin (views->dataUser.blade.php)-->
              <i class="nav-icon fas fa-table"></i> 
              <p>
                Data
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
    <div class="content-wrapper" style="padding: 0 30px 0 30px ">
    <section class="content-header" id="Statistik">
      <h3>Data Statistik Industri di Kota Surakarta</h3>
    </section>
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="  fas fa-pizza-slice"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Agro dan Aneka Pangan</span>
                <span class="info-box-number"> {{$count}} Unit usaha</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class=" fas fa-tshirt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tekstil dan Produk Tekstil</span>
                <span class="info-box-number"> {{$hitung}} Unit usaha</span>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class=" far fa-building"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Aneka dan Usaha Industri</span>
                <span class="info-box-number"> {{$jumlah}} Unit usaha</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br><br>

    <section class="content-header"  id="DataIndustri">
      <h3>Daftar Industri di Kota Surakarta</h3>
    </section>
    <section class="content">
    <div class="container-fluid">
    <form action="/DataStatistik/cari" method="GET">
      <div class="row">
        <div class="col-md-3">
          <input class="form-control" type="text" name="cari" placeholder="Nama Industri" value="{{old('cari')}}">
        </div>
        <div class="col-md-3">
            <select id="filter-tipe" class="form-control filter" name="filter" value="{{old('filter')}}">
              <option value="">Semua</option>
                <?php foreach ($tipe_industri as $tipe) :?>
                  <option value="{{ $tipe['id_tipe_industri'] }}" >{{ $tipe['nama'] }}</option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <form role="form" action="/DataStatistik/cari" method="GET">
              <div class="box-body">
                <div class="row">
                <div class="form-group col-md-6">
                   <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{old('dari')}}">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control datepicker" name="sampai" id="exampleInputPassword1" placeholder="Sampai tanggal" autocomplete="off" value="{{old('sampai')}}">
                </div>
                </div>
              </div>
            </form>
          </div>
        <div class="col-md-2">
          <input class="btn btn-danger btn-sm" type="submit" value="CARI">
          <a href="/DataStatistik" class="btn btn-warning btn-sm">RESET</a>
        </div>
      </div> 
    </form>

    <br>
    <div class="push-top">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}  
        </div><br />
      @endif
      <table class="table">
        <thead>
            <tr class="table-primary">
              <td>No</td>
              <td>Nama Pemilik</td>
              <td>Nama Industri</td>
              <td>Alamat</td>
              <td>Tipe</td>
              <td>Komoditas</td>
              <td hidden>Updated_At</td>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
            <tr>
                <td>{{$data-> firstItem() + $key}}</td>
                <td>{{$d->nama_pemilik}}</td>
                <td>{{$d->nama_perusahaan}}</td>
                <td>{{$d->alamat_perusahaan}}</td>
                <td>{{$d->status_industri}}</td>
                <td>{{$d->komoditas}}</td>
                <td hidden>{{$d->updated_at}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
          {{$data->links()}}
</div>
</section>
</div>
  </main>
 
  <!-- AdminLTE App -->
  <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('template')}}/dist/js/demo.js"></script>
  
  <script>
     $(function () {
            $('.datepicker').datepicker({
              format: 'yyyy-mm-dd'
              });
        });
  </script>

</body>
</html>