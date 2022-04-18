<!-- merupakan tampilan dari halaman index manajemen admin -->

@extends('users.layout') <!--menggunakan views->users->layouts.blade.php sebagai layout website.-->

@section('content')

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <br>
  <a href="{{ route('users.create')}}" class="btn btn-primary btn-md">Tambah</a>
  <br><br>
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>No</td>
          <td width="30%">Nama</td>
          <td>Email</td>
          <td class="text-center">Keterangan</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td class="text-center">
                <a href="{{ route('users.edit', $data->id)}}" class="btn btn-primary btn-sm">Ubah</a>
                <form action="{{ route('users.destroy', $data->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection