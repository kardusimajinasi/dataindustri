<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendataan Industri</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
           body::after {
                content: "";
                background: url("gambar/background.jpg");
                background-size: cover;
                opacity: 80;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                position: absolute;
                z-index: -1;   
            }
            .top-right {
                position: absolute;
                right: 10px;
            }
            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link > a {
             text-decoration: none; 
             color: white;
            }
        </style>
</head>

<body>
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
              <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('gambar/LogoDisnakerperin.png')}}" alt="" width="20" height="30">
                    DISNAKERPERIN
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav links">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </div>
                    <div class="navbar-nav links top-right" >
                        @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/') }}">Selamat Datang</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                        @endif
                    </div>
                </div>
              </div>
            </nav>
  <main>
    <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12"  style="padding-top: 80px">
                        <div class="card">
                            <main>
                  <div class="content-wrapper" style="padding: 0 30px 0 30px ">
                  <section class="content-header" id="Statistik">
                    <h3>Data Statistik Industri di Kota Surakarta</h3>
                  </section>
                   <section class="content">
                                  <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-md-4 col-sm-6 col-12">
                                        <div class="card">
                                          <div class="card-body"  style="background-color: #B8DAFF">
                                            <span class="card-title"></span>
                                            <strong class="card-text">Agro dan Aneka Pangan</strong><br>
                                            <span class="card-text-number"> {{$count}} Unit usaha</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4 col-sm-6 col-12">
                                        <div class="card">
                                          <div class="card-body"  style="background-color: #B8DAFF">
                                            <span class="card-title"></span>
                                            <strong class="card-text">Tekstil dan Produk Tekstil</strong><br>
                                            <span class="card-text-number"> {{$hitung}} Unit usaha</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-4 col-sm-6 col-12">
                                        <div class="card">
                                          <div class="card-body" style="background-color: #B8DAFF">
                                            <span class="card-title"></span>
                                            <strong class="card-text ">Aneka dan Usaha Industri</strong><br>
                                            <span class="card-text-number"> {{$jumlah}} Unit usaha</span>
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
                  <form action="/statistik/cari" method="GET">
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
                          <form role="form" action="/statistik/cari" method="GET">
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
                        <a href="/statistik" class="btn btn-warning btn-sm">RESET</a>
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
              </div>
            </div>
          </div>
        </div>
  
  <script>
     $(function () {
            $('.datepicker').datepicker({
              format: 'yyyy-mm-dd'
              });
        });
  </script>

</body>
</html>