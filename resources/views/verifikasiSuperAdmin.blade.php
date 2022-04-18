@extends('layouts.superAdmin')

@section('content')
<main>
<div class="content-wrapper" style="padding: 0 30px 0 30px ">
  <br>
  <div class="col-sm-6">
      <h3 class="m-0 text-dark">Verifikasi Data</h3>
      <p class="m-0 text-dark">Berisi mengenai data yang telah diverifikasi</p>
  </div><!-- /.col -->
<br>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>No</td>
          <td>Nama Pemilik</td>
          <td>Nama Industri</td>
          <td>Alamat</td>
          <td>Tipe</td>
          <td>Komoditas</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->nama_perusahaan}}</td>
            <td>{{$data->alamat_perusahaan}}</td>
            <td>{{$data->status_industri}}</td>
            <td>{{$data->komoditas}}</td>
            <td class="text-center">
                <a href="/detailperusahaan/{{ $data->id_perusahaan }}" class="btn btn-warning btn-sm">Detail</a>
                <a href="/deleteperusahaan/{{ $data->id_perusahaan }}" class="btn btn-danger btn-sm">Hapus</a>
                <a href="/dataperusahaan/{{ $data->id_perusahaan }}" class="btn btn-secondary btn-sm">Batal Verifikasi</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
</main>
@endsection