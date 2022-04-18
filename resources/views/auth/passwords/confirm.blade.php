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
                        <a class="nav-link active" href="/">Dasar Hukum</a>
                        <a class="nav-link active" href="/datastatistik">Statistik</a>
                        <a class="nav-link active"  href="/">About</a>
                    </div>
                  
                </div>
              </div>
            </nav>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8" style="padding-top: 150px">
                        <div class="card">
                            <div class="card-header">{{ __('Confirm Password') }}</div>

                            <div class="card-body">
                                {{ __('Please confirm your password before continuing.') }}

                                <form method="POST" action="{{ route('password.confirm') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Confirm Password') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

