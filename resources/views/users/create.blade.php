<!-- merupakan tampilan dari halaman home dengan login sebagai admin-->

@extends('users.layout') <!--menggunakan views->users->layouts.blade.php sebagai layout website.-->

@section('content') 

<style> 
    .container {
      max-width: 450px;
    }
</style> 

<br>

<div class="card push-top">
  <div class="card-header">
    Add Admin
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('users.store') }}"> <!--form dengan method post untuk mengirim data dan setelah data disimpan maka akan merefer ke views->users->index.blade.php-->
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>  <!--input data ke kolom name di db users-->
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/> <!--input data ke kolom email di db users-->
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password"/> <!--input data ke kolom password di db users-->
          </div>
          <div class="form-group" hidden> <!--hidden agar super admin tidak perlu melakukan input is_admin -->
              <label for="is_admin">Kode</label>
              <input type="text" class="form-control" name="is_admin" placeholder="1" value="1" /> <!--input data ke kolom is_admin di db users. value langsung diisi dengan 1(kode untuk admin)-->
          </div>
          <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Tambah Admin</button> <!--melakukan submit agar data disimpan-->
          </div>
      </form>
      <div class="col-1 text-right">   
        <a href="/users" class="btn btn-danger pull-right">Kembali</a> <!--kembali ke tampilan data manajemen admin-->
      </div>
  </div>
</div>
@endsection