<!-- merupakan tampilan dari halaman home dengan login sebagai admin-->

@extends('layouts.admin')

@section('content')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Selamat Datang, {{Auth::user()->name}}!</h3> 
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h5>Data Statistik</h5>
                <p>Melihat Daftar Industri<br> di Kota Surakarta<br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/dataStatistik" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <!--merefer ke tampilan menu data statistik milik admin-->
              
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5>Data</h5>
                <p>Menambah, melihat, <br>mengubah, dan <br> menghapus data</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/dataPerusahaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <!--merefer ke tampilan menu data milik admin-->
            </div>
          </div>
      </div>
      <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h5>Status Verifikasi</h5>
                <p>Berisi data yang telah <br>diverifikasi<br><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/verifikasiperusahaan/{id_perusahaan}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <!--merefer ke tampilan menu status verifikasi milik admin-->
            </div>
          </div>
      </div>
        </div>
        </div>
    </section>
</div>


@endsection