<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-COmpatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table.static{
          position: relative;
          border: 1px solid #543535;
        }
        td{
          width: 30%;
        }
        h4{
          margin-left: 25px;
        }
    </style>
    <title>CETAK DATA INDUSTRI</title>
</head>
<body>
  <div class="form-group">
      <h4 align="center">LAPORAN DATA INDUSTRI</h4>
      <h5 align="center">Industri: {{ isset($data->nama_perusahaan) ? $data->nama_perusahaan : "" }}</h5> <!-- isset melakukan pengecekan apakah data ada, apabila ada maka akan ditampilan nama_perusahaan. apabla tidak maka data yang ditampilkan kosong -->
      <br>
      <h4>Data Pemilik Industri</h4>
      <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
          <tr> <td>NIK</td> <td>{{ isset($data->nik) ? $data->nik : "" }}</td> </tr>
              <tr> <td>Nama</td> <td>{{ isset($data->nama) ? $data->nama : "" }}</td> </tr>
              <tr> <td>Alamat</td> <td>{{ isset($data->alamat) ? $data->alamat : "" }}</td> </tr>
              <tr> <td>Kelurahan</td> <td>{{ isset($data_pemilik->nama_kelurahan) ? $data_pemilik->nama_kelurahan : "" }}</td> </tr>
              <tr> <td>Kecamatan</td> <td>{{ isset($data_pemilik->nama_kecamatan) ? $data_pemilik->nama_kecamatan : "" }}</td> </tr>
              <tr> <td>Kode Pos</td> <td>{{ isset($data->kodepos) ? $data->kodepos : "" }}</td> </tr>
              <tr> <td>Telepon</td> <td>{{ isset($data->telepon) ? $data->telepon : "" }}</td> </tr>
              <tr> <td>Email</td> <td>{{ isset($data->email) ? $data->email : "" }}</td> </tr>
              <tr> <td>NPWP</td> <td>{{ isset($data->npwp) ? $data->npwp : "" }}</td> </tr>
      </table> <br>
      <h4>Data Industri</h4>
      <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
          <tr> <td>Logo Perusahaan</td> <td> <?php if(isset($data->foto_perusahaan)){ ?> <a href="{{asset('logo/'.$data->foto_perusahaan)}}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a> <?php } ?></td> </tr>
              <tr> <td>Badan Usaha</td> <td>{{ isset($data->status_usaha) ? $data->status_usaha : "" }}</td> </tr>
              <tr> <td>Nama Perusahaan</td> <td>{{ isset($data->nama_perusahaan) ? $data->nama_perusahaan : "" }}</td> </tr>
              <tr> <td>Alamat Perusahaan</td> <td>{{ isset($data->alamat_perusahaan) ? $data->alamat_perusahaan : "" }}</td> </tr>
              <tr> <td>Kelurahan</td> <td>{{ isset($data->nama_kelurahan) ? $data->nama_kelurahan : "" }}</td> </tr>
              <tr> <td>Kecamatan</td> <td>{{ isset($data->nama_kecamatan) ? $data->nama_kecamatan : "" }}</td> </tr>
              <tr> <td>Latitude</td> <td>{{ isset($data->latitude) ? $data->latitude : "" }}</td> </tr>
              <tr> <td>Longitude</td> <td>{{ isset($data->longitude) ? $data->longitude : "" }}</td> </tr>
              <tr> <td>NPWP</td> <td>{{ isset($data->npwp_perusahaan) ? $data->npwp_perusahaan : "" }}</td> </tr>
              <tr> <td>Email</td> <td>{{ isset($data->email_perusahaan) ? $data->email_perusahaan : "" }}</td> </tr>
              <tr> <td>Website</td> <td>{{ isset($data->website) ? $data->website : "" }}</td> </tr>
              <tr> <td>Telepon</td> <td>{{ isset($data->telepon_perusahaan) ? $data->telepon_perusahaan : "" }}</td> </tr>
              <tr> <td>No Fax</td> <td>{{ isset($data->fax) ? $data->fax : "" }}</td> </tr>
              <tr> <td>Tipe Industri</td> <td>{{ isset($data->status_industri) ? $data->status_industri : "" }}</td> </tr>
              <tr> <td>Industri Kreatif</td> <td>{{ isset($data->status_kreatif) ? $data->status_kreatif : "" }}</td> </tr>
              <tr> <td>Komoditas</td> <td>{{ isset($data->komoditas) ? $data->komoditas : "" }}</td> </tr>
              <tr> <td>Jenis Produk</td> <td>{{ isset($data->jenis_produk) ? $data->jenis_produk : "" }}</td> </tr>
              <tr> <td>KBLI</td> <td>{{ isset($data->nama_kbli) ? $data->nama_kbli : "" }}</td> </tr>
              <tr> <td>Skala Industri</td> <td>{{ isset($data->nama_skala) ? $data->nama_skala : "" }}</td> </tr>
              <tr> <td>Izin Usaha</td> <td>{{ isset($data->izin_usaha) ? $data->izin_usaha : "" }}</td> </tr>
              <tr> <td>Tahun Izin</td> <td>{{ isset($data->tahun_izin) ? $data->tahun_izin : "" }}</td> </tr>
              <tr> <td>Jumlah Tenaga Laki-laki</td> <td>{{ isset($data->jumlah_tenaga_lk) ? $data->jumlah_tenaga_lk : "" }}</td> </tr>
              <tr> <td>Jumlah Tenaga Perempuan</td> <td>{{ isset($data->jumlah_tenaga_pr) ? $data->jumlah_tenaga_pr : "" }}</td> </tr>
              <tr> <td>Rata-Rata Pendidikan Tenaga</td> <td>{{ isset($data->nama_pendidikan) ? $data->nama_pendidikan : "" }}</td> </tr>
              <tr> <td>Tingkat Keterampilan (Jumlah)</td> <td>
              <?php foreach( $data_keterampilan as $dk){ ?>
                {{ isset($dk->nama) ? $dk->nama : "" }} - {{ isset($dk->jumlah_keterampilan) ? $dk->jumlah_keterampilan : "" }} <br>
              <?php } ?> 
              </td> </tr>
              <tr> <td>Keikutsertaan BPJS (Jumlah)</td> <td>
                <?php foreach( $data_bpjs as $db){ ?>
                {{ isset($db->nama) ? $db->nama : "" }} - {{ isset($db->jumlah_bpjs) ? $db->jumlah_bpjs : "" }} <br>
              <?php } ?> 
              </td> </tr>
              <tr> <td>Investasi</td> <td>{{ isset($data->status_investasi) ? $data->status_investasi : "" }}</td> </tr>
              <tr> <td>Omset</td> <td>{{ isset($data->omset) ? $data->omset : "" }}</td> </tr>
              <tr> <td>Bahan Baku</td> <td>{{ isset($data->bahan_baku) ? $data->bahan_baku : "" }}</td> </tr>
              <tr> <td>Nilai Bahan Baku</td> <td>{{ isset($data->nilai_bahan_baku) ? $data->nilai_bahan_baku : "" }}</td> </tr>
              <tr> <td>Bahan Penolong</td> <td>{{ isset($data->bahan_penolong) ? $data->bahan_penolong : "" }}</td> </tr>
              <tr> <td>Nilai Bahan Penolong</td> <td>{{ isset($data->nilai_bahan_penolong) ? $data->nilai_bahan_penolong : "" }}</td> </tr>
              <tr> <td>Nilai Mesin/Peralatan</td> <td>{{ isset($data->nilai_mesin_peralatan) ? $data->nilai_mesin_peralatan : "" }}</td> </tr>
              <tr> <td>Nilai Modal Kerja</td> <td>{{ isset($data->nilai_modal_kerja) ? $data->nilai_modal_kerja : "" }}</td> </tr>
              <tr> <td>Akses Bahan Baku</td> <td>{{ isset($data->status_akses) ? $data->status_akses : "" }}</td> </tr>
              <tr> <td>Jumlah Bahan Terbuang</td> <td>{{ isset($data->jumlah_terbuang) ? $data->jumlah_terbuang : "" }}</td> </tr>
              <tr> <td>Jumlah Produk Cacat</td> <td>{{ isset($data->jumlah_cacat) ? $data->jumlah_cacat : "" }}</td> </tr>
              <tr> <td>Peralatan Produksi</td> <td>{{ isset($data->status_mesin) ? $data->status_mesin : "" }}</td> </tr>
              <tr> <td>Nama Mesin</td> <td>{{ isset($data->nama_mesin) ? $data->nama_mesin : "" }}</td> </tr>
              <tr> <td>Volume Produksi</td> <td>{{ isset($data->volume_mesin) ? $data->volume_mesin : "" }}</td> </tr>
              <tr> <td>Harga Satuan</td> <td>{{ isset($data->harga_satuan) ? $data->harga_satuan : "" }}</td> </tr>
              <tr> <td>Nilai Produksi Total</td> <td>{{ isset($data->nilai_produksi_total) ? $data->nilai_produksi_total : "" }}</td> </tr>
              <tr> <td>Pengelolaan Keuangan</td> <td>{{ isset($data->status_pengelolaan) ? $data->status_pengelolaan : "" }}</td> </tr>
              <tr> <td>Pencatatan Keuangan</td> <td>{{ isset($data->status_pencatatan) ? $data->status_pencatatan : "" }}</td> </tr>
              <tr> <td>Akses Modal</td> <td>{{ isset($data->status_modal) ? $data->status_modal : "" }}</td> </tr>
              <tr> <td>Pertumbuhan Penjualan</td> <td>{{ isset($data->jumlah_pertumbuhan) ? $data->jumlah_pertumbuhan : "" }}</td> </tr>
              <tr> <td>Cara Penjualan</td> <td>{{ isset($data->cara_jual) ? $data->cara_jual : "" }}</td> </tr>
              <tr> <td>Area Pemasaran</td> <td>{{ isset($data->area) ? $data->area : "" }}</td> </tr>
              <tr> <td>Pemasaran Online</td> <td>{{ isset($data->online) ? $data->online : "" }}</td> </tr>
              <tr> <td>Negara Ekspor</td> <td>{{ isset($data->negara_ekspor) ? $data->negara_ekspor : "" }}</td> </tr>
              <tr> <td>Frekuensi Keterlambatan Pengiriman</td> <td>{{ isset($data->jumlah_terlambat) ? $data->jumlah_terlambat : "" }}</td> </tr>
              <tr> <td>Frekuensi Produk Dikomplain/Ditolak</td> <td>{{ isset($data->jumlah_komplain) ? $data->jumlah_komplain : "" }}</td> </tr>
              <tr> <td>Jenis Energi</td> <td>{{ isset($data->nama_energi) ? $data->nama_energi : "" }}</td> </tr>
              <tr> <td>Daya Perbulan</td> <td>{{ isset($data->daya_energi) ? $data->daya_energi : "" }}</td> </tr>
              <tr> <td>Limbah yang Dihasilkan</td> <td>{{ isset($data->limbah) ? $data->limbah : "" }}</td> </tr>
              <tr> <td>Olahan Limbah</td> <td>{{ isset($data->olahan_limbah) ? $data->olahan_limbah : "" }}</td> </tr>
              <tr> <td>Jumlah Limbah</td> <td>{{ isset($data->jumlah_limbah) ? $data->jumlah_limbah : "" }}</td> </tr>
              <tr> <td>Satuan Limbah</td> <td>{{ isset($data->satuan_limbah) ? $data->satuan_limbah : "" }}</td> </tr>
              <tr> <td>Tenaga Desainer atau R&D</td> <td>{{ isset($data->desainer) ? $data->desainer : "" }}</td> </tr>
              <tr> <td>Inovasi Mesin</td> 
                @if($data->inovasi_mesin == '')<td></td> @endif
                @if($data->inovasi_mesin == '1')<td>Belum</td> @endif 
                @if($data->inovasi_mesin == '2')<td>Sudah</td>@endif
              </tr>
              <tr> <td>Inovasi Bahan</td> 
                @if($data->inovasi_bahan == '')<td></td> @endif
                @if($data->inovasi_bahan == '1')<td>Belum</td> @endif 
                @if($data->inovasi_bahan == '2')<td>Sudah</td>@endif
              </tr>
              <tr> <td>Inovasi Produk</td> 
                @if($data->inovasi_produk == '')<td></td> @endif
                @if($data->inovasi_produk == '1')<td>Belum</td> @endif 
                @if($data->inovasi_produk == '2')<td>Sudah</td>@endif
              </tr>
              <tr> <td>Komitmen Pimpinan Terhadap Kualitas</td> <td>{{ isset($data->status_komitmen) ? $data->status_komitmen : "" }}</td> </tr>
      </table>
      <br>
      <h4>Administrasi Legalitas dan Standardisasi</h4>
      <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr> <td>Standar Mutu Produk</td> <td>{{ isset($data->status_standar) ? $data->status_standar : "" }}</td> </tr>
            <tr> <td>Sertifikat Produk</td> <td>
                <?php foreach( $data_sertifikat as $ds){ ?>
                {{ isset($ds->nama) ? $ds->nama : "" }} <br> {{ isset($ds->nomor_sertifikat) ? $ds->nomor_sertifikat : "" }} <br> <?php if(isset($ds->dokumen_sertifikat)){ ?> <a href="{{asset('dokumen_sertifikat/'.$ds->dokumen_sertifikat)}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a> <?php } ?> <br> <br>
              <?php } ?> 
              </td> </tr>
      </table>
      <br>
      <h4>Fasilitas dari Pemerintah</h4>
      <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr> <td>Pameran</td> <td>
                <?php foreach( $data_pameran as $dp){ ?>
                {{ isset($dp->nama) ? $dp->nama : "" }} <br> {{ isset($dp->nama_pameran) ? $dp->nama_pameran : "" }} <br> <?php if(isset($dp->dokumen_pameran)){ ?> <a href="{{asset('dokumen_pameran/'.$dp->dokumen_pameran)}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a> <?php } ?> <br><br>
              <?php } ?> 
              </td> </tr>
              <tr> <td>Pelatihan Manajemen Mutu</td> <td>
                <?php foreach( $data_pelatihan as $dpel){ ?>
                {{ isset($dpel->nama_pelatihan) ? $dpel->nama_pelatihan : "" }} <br> <?php if(isset($dpel->dokumen_pelatihan)){ ?> <a href="{{asset('dokumen_pelatihan/'.$dpel->dokumen_pelatihan)}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a> <?php } ?> <br><br>
              <?php } ?> 
              </td> </tr>
              <tr> <td>Bantuan Alat</td> <td>
                <?php foreach( $data_bantuan_alat as $dba){ ?>
                {{ isset($dba->tahun_alat) ? $dba->tahun_alat : "" }} <br> {{ isset($dba->bentuk_alat) ? $dba->bentuk_alat : "" }} <br> <?php if(isset($dba->dokumen_alat)){ ?> <a href="{{asset('dokumen_bantuan_alat/'.$dba->dokumen_alat)}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a> <?php } ?><br><br>
              <?php } ?> 
              </td> </tr>
              <tr> <td>Bantuan Bahan</td> <td>
                <?php foreach( $data_bantuan_bahan as $dbb){ ?>
                {{ isset($dbb->tahun_bahan) ? $dbb->tahun_bahan : "" }} <br> {{ isset($dbb->bentuk_bahan) ? $dbb->bentuk_bahan : "" }} <br> <?php if(isset($dbb->dokumen_bahan)){ ?> <a href="{{asset('dokumen_bantuan_bahan/'.$dbb->dokumen_bahan)}}" target="_blank" rel="noopener noreferrer">Lihat Dokumen</a> <?php } ?><br><br>
              <?php } ?> 
              </td> </tr>
      </table>
    </div>
    <script type="text/javascript">
      window.print();
    </script>
</body>
</html>