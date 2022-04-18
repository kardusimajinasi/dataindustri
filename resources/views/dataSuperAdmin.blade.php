@extends('layouts.superAdmin')

@section('content')
<main>
<div class="content-wrapper" style="padding: 0 30px 0 30px ">

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <br>
  <a href="/tambahdata" class="btn btn-primary btn-md">Tambah</a>
  <br><br>
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
            <td>{{$data->tipe_industri_id}}</td>
            <td>{{$data->komoditas}}</td>
            <td class="text-center">
                <a href="/detailperusahaan/{{ $data->id_perusahaan }}" class="btn btn-warning btn-sm">Detail</a>
                <a href="/editperusahaan/{{ $data->id_perusahaan }}" class="btn btn-primary btn-sm">Ubah</a>
                <a onclick="return konfirmasi()" href="/deleteperusahaan/{{ $data->id_perusahaan }}" class="btn btn-danger btn-sm">Hapus</a>
                <a href="/verifikasiPerusahaan/{{ $data->id_perusahaan }}" class="btn btn-secondary btn-sm">Verifikasi</a>
                
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
</main>
@endsection

@section('script')
<script type="text/javascript" language="JavaScript">
  function konfirmasi()
  {
    tanya = confirm("Anda Yakin Akan Menghapus Data?");
    if(tanya==true) return true;
    else return false;
  }
</script>
@endsection