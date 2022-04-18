<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pendataan Industri</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

        <!-- Styles -->
        <style>
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
        <div> 
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
                        <a class="nav-link active" href="#about">Dasar Hukum</a>
                        <a class="nav-link active" href="/statistik">Statistik</a>
                        <a class="nav-link active"  href="#about">About</a>
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
            <div id="slider" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                   <img src="{{asset('gambar/background.jpg')}}" width="1500" height="750"> 
                </div>
                <div class="carousel-item">
                   <img class="d-block w-100"  src="{{asset('gambar/1.png')}}" width="1500" height="750">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('gambar/KantorDisnakerperin.jpg')}}" width="1500" height="750">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('gambar/2.png')}}" width="1500" height="750">
                </div> 
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('gambar/3.png')}}" width="1500" height="750">
                </div>
              </div>
              <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>
            </div>
            
        </div> 
  </body>
  <footer class="page-footer font-small teal pt-4" style="padding-left:20px;background-color: #212529; color:white;">
        <div class="container-fluid text-left text-md-left">
            <div class="row">
                <div class="col-md-6 mb-md-0 mb-3 link">
                    <h5 class="text-uppercase font-weight">Link Terkait</h5>
                    <a  href="https://surakarta.go.id/">Pemerintah Kota Surakarta </a> <br>
                    <a href="https://disnakerperin.surakarta.go.id/">Dinas Tenaga Kerja dan Perindustrian Kota Surakarta </a> <br>
                    <a href="https://ipc.disnakerperin.surakarta.go.id/">Industry Promotion Center </a><br>
                    <a href="http://disperindag.jatengprov.go.id/">Disperindag Provinsi Jawa Tengah </a><br>
                    <a href="https://www.kemenperin.go.id/">Kementrian Perindustrian RI </a>
                </div>
                <div class="col-md-6 mt-md-0 mt-3 link" id="about">
                    <h5 class="text-uppercase font-weight">Dasar Hukum</h5>
                    <a href="https://peraturan.bpk.go.id/Home/Download/27824/UU%20Nomor%2003%20Tahun%202014.pdf">UU No. 3 Tahun 2014 </a><br>
                    <a href="https://peraturan.bpk.go.id/Home/Details/5822">PP No.2 Tahun 2017 </a><br>
                    <a href="http://disperindag.sumbarprov.go.id/images/2019/04/file/Permenperin_No__2_Tahun_2019_.pdf">PERMENPERIN No.2 Tahun 2019 </a><br>
                    <a href="">PERMENPERIN No.17 Tahun 2018 </a><br>
                    <a href="">PERMENPERIN No.38 Tahun 2018  </a><br>
                    <a href="">PERMENDAGRI No.90 Tahun 2019 </a><br><br>
                    <h5 class="text-uppercase font-weight">Informasi Kontak</h5>
                    <p> Jl. Slamet Riyadi No.306, Sriwedari, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57141 <br> 0271 - 714800 <br> dinaskerperindska@gmail.com</p>
                    <p>
                        <a href="https://www.instagram.com/disnakerperinkotasurakarta/"><img src="{{asset('gambar/instagram.jpg')}}" width="40px" height= "40px" /></a>
                        <a href="#"><img src="{{asset('gambar/twitter.jpg')}}" width="50px" height= "40px" /></a>
                    </p>
                </div>
            </div>
        </div>
        <br>
        <center>
        <p>Copyright &copy; 2021 <a href="https://disnakerperin.surakarta.go.id/">DISNAKERPERIN</a>. All rights reserved</p>
        </center>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>

