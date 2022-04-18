<!-- merupakan tampilan dari halaman edit pada menu manajemen admin-->

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
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('users.update', $data->id) }}"> 
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $data->name }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $data->email }}"/>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" value="{{ $data->password }}" /> 
          </div>
          <div class="form-group" hidden>
              <label for="is_admin">Kode</label>
              <input type="text" class="form-control" name="is_admin" placeholder="1" value="1" />
          </div>
          <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Ubah Admin</button>
          </div>
      </form>
      <div class="col-1 text-right">   
        <a href="/users" class="btn btn-danger pull-right">Kembali</a>
      </div>
  </div>
</div>
@endsection