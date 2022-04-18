@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <div  style="padding: 0 30px 0 30px">
    <br>
  <a href="/DataPerusahaan" class="btn btn-primary btn-md" >Kembali</a>
  </div>
  <div style="    display: flex;
    flex-direction: column;
    align-items: center; padding:20px">

    <div id="smartwizard" style="width: 80%;">
      <ul class="nav">
        <li>
          <a class="nav-link" href="#step-1">
            Data Pemilik
          </a>
        </li>
        <li>
          <a class="nav-link" href="#step-2">
            Data Perusahaan
          </a>
        </li>
        <li>
          <a class="nav-link" href="#step-3">
            Administrasi Legalitas Usaha dan Standardisasi
          </a>
        </li>
        <li>
          <a class="nav-link" href="#step-4">
            Fasilitas dari Pemerintah
          </a>
        </li>
      </ul>

      <div class="tab-content">
        <form class="row g-3" method="post" action="/UbahData/saveEdit/{id_perusahaan}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

          <div id="step-1" class="tab-pane" role="tabpanel" style="padding: 10px 30px 0 30px">
            <div class="mb-3" hidden>
              <label for="idPerusahaan" class="form-label">ID</label>
              <input type="text" class="form-control" name="id_perusahaan" id="idPerusahaan" value="{{ $id_perusahaan }}">
            </div>
            <div class="mb-3">
              <label for="inputNIK" class="form-label">NIK</label>
              <input type="text" class="form-control" name="nik" id="inputNIK" value="{{ $data_edit->nik }}">
            </div>
            <div class="mb-3">
              <label for="inputNamaPemilik" class="form-label">Nama Pemilik</label>
              <input type="text" class="form-control" name="nama" id="inputNamaPemilik" value="{{ $data_edit->nama }}">
            </div>
            <div class="mb-3">
              <label for="inputAlamatPemilik" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="inputAlamatPemilik" value="{{ $data_edit->alamat }}">
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="inputRT" class="form-label">RT</label>
                <input type="text" class="form-control" name="rt" id="inputRT" value="{{ $data_edit->rt }}">
              </div>
              <div class="col-md-3">
                <label for="inputRW" class="form-label">RW</label>
                <input type="text" class="form-control" name="rw" id="inputRW" value="{{ $data_edit->rw }}">
              </div>
              <div class="col-md-6">
                <label for="inputKodePos" class="form-label">Kode Pos</label>
                <input type="text" class="form-control" name="kodepos" id="inputKodePos" value="{{ $data_edit->kodepos }}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="inputKecamatanPemilik" class="form-label">Kecamatan</label>
                <select id="inputKecamatanPemilik" class="form-select" name="kecamatan">
                  <option value="">--Kecamatan--</option>
                  <?php  foreach ($kecamatan as $kec) :
                  if ($data_edit->kecamatan_id == $kec['id_kecamatan']) :
                  ?>
                    <option value="{{ $kec['id_kecamatan'] }}" selected>{{ $kec['nama'] }}</option>
                  <?php
                  else :
                  ?>
                    <option value="{{ $kec['id_kecamatan'] }}">{{ $kec['nama'] }}</option>
                  <?php
                  endif;
                endforeach; ?>
              </select>
              </div>
            <div class="col-md-6">
              <label for="inputKelurahanPemilik" class="form-label">Kelurahan</label>
              <select id="inputKelurahanPemilik" class="form-select" placeholder="kelurahan" name="kelurahan">
                <option value="">--Kelurahan--</option>
                <?php  foreach ($kelurahan as $kel) :
                  if ($data_edit->kelurahan_id == $kel['id_kelurahan']) :
                  ?>
                    <option value="{{ $kel['id_kelurahan'] }}" selected>{{ $kel['nama'] }}</option>
                  <?php
                  else :
                  ?>
                    <option value="{{ $kel['id_kelurahan'] }}">{{ $kel['nama'] }}</option>
                  <?php
                  endif;
                endforeach; ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="inputTeleponPemilik" class="form-label">Telepon</label>
              <input type="text" class="form-control" name="telepon" id="inputTeleponPemilik" value="{{ $data_edit->telepon }}">
            </div>
            <div class="col">
              <label for="inputEmailPemilik" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="inputEmailPemilik" value="{{ $data_edit->email }}">
            </div>
            <div class="col">
              <label for="inputNPWPPemilik" class="form-label">NPWP</label>
              <input type="text" class="form-control" name="npwp" id="inputNPWPPemilik" value="{{ $data_edit->npwp }}">
            </div>
          </div>
          <br><br>
          <div class="card-footer">
            <div class="row">
              <div class="col-12 text-right">
                <a href="#step-2" class="btn btn-primary pull-right">Next</a>
              </div>
            </div>
          </div>
      </div>

      <div id="step-2" class="tab-pane" role="tabpanel" style="padding: 10px 30px 0 30px">
        <div class="row">
          <div class="col-md-3">
            <label for="inputBadanUsaha" class="form-label">Badan Usaha</label>
            <select id="inputBadanUsaha" class="form-select" name="badan_usaha">
              <?php foreach ($badan_usaha as $bu) : 
              if ($data_edit->badan_usaha == $bu['id_badan_usaha']) : ?>
                  <option value="{{ $bu['id_badan_usaha'] }}" selected>{{ $bu['nama'] }}</option>
                <?php
                else :?>
                  <option value="{{ $bu['id_badan_usaha'] }}">{{ $bu['nama'] }}</option>
                <?php
                endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-9">
            <label for="inputNamaPerusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" name="nama_perusahaan" id="inputNamaPerusahaan" value="{{ $data_edit->nama_perusahaan }}">
          </div>
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Logo Perusahaan</label>
          <input class="form-control" type="file" name="foto_perusahaan" id="formFile">
          current file : <a href="{{ URL::to('/') }}/logo/{{ $data_edit->foto_perusahaan }}" target="_blank">{{ $data_edit->foto_perusahaan }}</a>
        </div>
        <div class="mb-3">
          <label for="inputAlamatPerusahaan" class="form-label">Alamat</label>
          <input type="text" class="form-control" name="alamat_perusahaan" id="inputAlamatPerusahaan" value="{{ $data_edit->alamat_perusahaan }}">
        </div>
        <div class="row">
          <div class="col-md-3">
            <label for="inputKecamatan" class="form-label">Kecamatan</label>
            <select id="inputKecamatan" class="form-select" name="kecamatan_perusahaan">
              <option value="">--Kecamatan--</option>
              <?php
              foreach ($kecamatan as $kec) :
                if ($data_edit->kecamatan_perusahaan == $kec['id_kecamatan']) :
                ?>
                  <option value="{{ $kec['id_kecamatan'] }}" selected>{{ $kec['nama'] }}</option>
                <?php
                else :
                ?>
                  <option value="{{ $kec['id_kecamatan'] }}">{{ $kec['nama'] }}</option>
              <?php
                endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputKelurahan" class="form-label">Kelurahan</label>
            <select id="inputKelurahan" class="form-select" placeholder="kelurahan" name="kelurahan_perusahaan">
              <option value="">--Kelurahan--</option>
                <?php  foreach ($kelurahan as $kel) :
                  if ($data_edit->kelurahan_perusahaan == $kel['id_kelurahan']) :
                  ?>
                    <option value="{{ $kel['id_kelurahan'] }}" selected>{{ $kel['nama'] }}</option>
                  <?php
                  else :
                  ?>
                    <option value="{{ $kel['id_kelurahan'] }}">{{ $kel['nama'] }}</option>
                  <?php
                  endif;
                endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputLatitude" class="form-label">Latitude</label>
            <input type="text" class="form-control" name="latitude" id="inputLatitude" value="{{ $data_edit->latitude }}">
          </div>
          <div class="col-md-3">
            <label for="inputLongitude" class="form-label">Longitude</label>
            <input type="text" class="form-control" name="longitude" id="inputLongitude" value="{{ $data_edit->longitude }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputNPWPPerusahaan" class="form-label">NPWP</label>
            <input type="text" class="form-control" name="npwp_perusahaan" id="inputNPWPPerusahaan" value="{{ $data_edit->npwp_perusahaan }}">
          </div>
          <div class="col-md-6">
            <label for="inputEmailPerusahaan" class="form-label">Email</label>
            <input type="text" class="form-control" name="email_perusahaan" id="inputEmailPerusahaan" value="{{ $data_edit->email_perusahaan }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputWebsite" class="form-label">Website</label>
            <input type="text" class="form-control" name="website" id="inputWebsite" value="{{ $data_edit->website }}">
          </div>
          <div class="col-md-3">
            <label for="inputTeleponPerusahaan" class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon_perusahaan" id="inputTeleponPerusahaan" value="{{ $data_edit->telepon_perusahaan }}">
          </div>
          <div class="col-md-3">
            <label for="inputFax" class="form-label">No. Fax</label>
            <input type="text" class="form-control" name="fax" id="inputFax" value="{{ $data_edit->fax }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputTipe" class="form-label">Tipe Industri</label>
            <select id="inputTipe" class="form-select" name="tipe_industri">
              <?php foreach ($tipe_industri as $tipe) : 
              if ($data_edit->tipe_industri_id == $tipe['id_tipe_industri']) : ?>
                  <option value="{{ $tipe['id_tipe_industri'] }}" selected>{{ $tipe['nama'] }}</option>
                <?php
                else :?>
                  <option value="{{ $tipe['id_tipe_industri'] }}">{{ $tipe['nama'] }}</option>
                <?php
                endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputKreatif" class="form-label">Industri Kreatif</label>
            <select id="inputKreatif" class="form-select" name="industri_kreatif">
              <?php foreach ($industri_kreatif as $ik) : 
              if ($data_edit->industri_kreatif_id == $ik['id_industri_kreatif']) : ?>
                  <option value="{{ $ik['id_industri_kreatif'] }}" selected>{{ $ik['nama'] }}</option>
                <?php
                else :?>
                  <option value="{{ $ik['id_industri_kreatif'] }}">{{ $ik['nama'] }}</option>
                <?php
                endif;
              endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputKomoditas" class="form-label">Komoditas</label>
            <input type="text" class="form-control" name="komoditas" id="inputKomoditas" value="{{ $data_edit->komoditas }}">
          </div>
          <div class="col-md-6">
            <label for="inputJenisProduk" class="form-label">Jenis Produk</label>
            <input type="text" class="form-control" name="jenis_produk" id="inputJenisProduk" value="{{ $data_edit->jenis_produk }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label for="kbli" class="form-label">KBLI</label>
            <select name="kbli" id="kbli" class="form-select">
               <?php foreach ($kbli as $kbli) : 
                if ($data_edit->id_kbli == $kbli['id_kbli']) : ?>
                    <option value="{{ $kbli['id_kbli'] }}" selected>{{ $kbli['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $kbli['id_kbli'] }}">{{ $kbli['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputSkala" class="form-label">Skala Industri</label>
            <select id="inputSkala" class="form-select" name="skala_industri">
              <?php foreach ($skala_industri as $s) : 
              if ($data_edit->skala_id == $s['id_skala']) : ?>
                  <option value="{{ $s['id_skala'] }}" selected>{{ $s['nama'] }}</option>
                <?php
                else :?>
                  <option value="{{ $s['id_skala'] }}">{{ $s['nama'] }}</option>
                <?php
                endif;
              endforeach; ?>

            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <label for="inputIzin" class="form-label">Izin Usaha</label>
            <input type="text" class="form-control" name="izin_usaha" id="inputIzin" value="{{ $data_edit->izin_usaha }}">
          </div>
          <div class="col-md-4">
            <label for="inputTahunIzin" class="form-label">Tahun Izin</label>
            <input type="text" class="form-control" name="tahun_izin" id="inputTahunIzin" value="{{ $data_edit->tahun_izin }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="inputTenagaLK" class="form-label">Jumlah Tenaga Laki-laki</label>
            <input type="text" class="form-control" name="jumlah_tenaga_lk" id="inputTenagaLK" value="{{ $data_edit->jumlah_tenaga_lk }}">
          </div>
          <div class="col-md-4">
            <label for="inputTenagaPR" class="form-label">Jumlah Tenaga Perempuan</label>
            <input type="text" class="form-control" name="jumlah_tenaga_pr" id="inputTenagaPR" value="{{ $data_edit->jumlah_tenaga_pr }}">
          </div>
          <div class="col-md-4">
            <label for="inputPendidikan" class="form-label">Rata-Rata Pendidikan Terakhir</label>
            <select id="inputPendidikan" class="form-select" name="pendidikan_tenaga">
              <?php foreach ($pendidikan_tenaga as $p) : 
                if ($data_edit->pendidikan_tenaga_id == $p['id_pendidikan']) : ?>
                    <option value="{{ $p['id_pendidikan'] }}" selected>{{ $p['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $p['id_pendidikan'] }}">{{ $p['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label>Tingkat Keterampilan Tenaga</label>
          <?php 
          foreach ($tingkat_keterampilan_tenaga as $tkt) :
            $done = false;
          ?>
            <?php foreach ($data_edit_keterampilan as $dek) :
              if ($dek->id_keterampilan == $tkt->id_keterampilan) :
                $done = true;
            ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $dek->id_keterampilan }}" name="keterampilan[{{ $dek->id_keterampilan }}][id]" id="perusahaan{{ $dek->id_keterampilan }}" checked>
                  <label class="form-check-label" for="perusahaan{{ $dek->id_keterampilan }}">
                    {{ $dek->nama }}
                  </label>
                  <input type="text" class="form-control" id="inputKeterampilan{{ $dek->id_keterampilan }}" value="{{ $dek->jumlah_keterampilan }}" name="keterampilan[{{ $dek->id_keterampilan }}][jumlah_keterampilan]" placeholder="Jumlah Tenaga">
                </div>
              <?php
                break;
              endif;
            endforeach;
            if (!$done) :
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $tkt['id_keterampilan'] }}" name="keterampilan[{{ $tkt['id_keterampilan'] }}][id]" id="perusahaan{{ $tkt['id_keterampilan'] }}">
              <label class="form-check-label" for="perusahaan{{ $tkt['id_keterampilan'] }}">
                {{ $tkt['nama'] }}
              </label>
              <input type="text" class="form-control" id="inputKeterampilan{{ $tkt['id_keterampilan'] }}" name="keterampilan[{{ $tkt['id_keterampilan'] }}][jumlah_keterampilan]" placeholder="Jumlah Tenaga">
              </div>
            <?php
            endif;
            ?>
          <?php endforeach; ?>
        </div>
        <div class="mb-3">
          <label>Keikutsertaan BPJS</label>
          <?php foreach ($keikutsertaan_bpjs as $bpjs) :
            $done = false;
          ?>
            <?php foreach ($data_edit_bpjs as $deb) :
              if ($deb->nama == $bpjs->nama) :
                $done = true;
            ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $deb->id_bpjs }}" name="bpjs[{{ $deb->id_bpjs }}][id]" id="perusahaan{{ $deb->id_bpjs }}" checked>
                  <label class="form-check-label" for="perusahaan{{ $deb->id_bpjs }}">
                    {{ $deb->nama }}
                  </label>
                  <input type="text" class="form-control" id="inputBPJS{{ $deb->id_bpjs }}" value="{{ $deb->jumlah_bpjs }}" name="bpjs[{{ $deb->id_bpjs }}][jumlah]" placeholder="Jumlah Tenaga">
                </div>
              <?php
                break;
              endif;
            endforeach;
            if (!$done) :
              ?>
              <div class="form-check">
                 <input class="form-check-input" type="checkbox" value="{{ $bpjs['id_bpjs'] }}" name="bpjs[{{ $bpjs['id_bpjs'] }}][id]" id="perusahaan{{ $bpjs['id_bpjs'] }}">
                <label class="form-check-label" for="perusahaan{{ $bpjs['id_bpjs'] }}">
                  {{ $bpjs['nama'] }}
                </label>
                <input type="text" class="form-control" id="inputBPJS{{ $bpjs['id_bpjs'] }}" name="bpjs[{{ $bpjs['id_bpjs'] }}][jumlah]" placeholder="Jumlah Tenaga">
              </div>
            <?php
            endif;
            ?>
          <?php endforeach; ?>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="inputInvestasi" class="form-label">Investasi</label>
            <select id="inputInvestasi" class="form-select" name="nilai_investasi">
              <?php foreach ($nilai_investasi as $i) : 
                if ($data_edit->investasi_id == $i['id_investasi']) : ?>
                    <option value="{{ $i['id_investasi'] }}" selected>{{ $i['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $i['id_investasi'] }}">{{ $i['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-8">
            <label for="inputOmset" class="form-label">Omset</label>
            <input type="text" class="form-control" name="omset" id="inputOmset" value="{{ $data_edit->omset }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputBahanBaku" class="form-label">Bahan Baku</label>
            <input type="text" class="form-control" name="bahan_baku" id="inputBahanBaku" value="{{ $data_edit->bahan_baku }}">
          </div>
          <div class="col-md-6">
            <label for="inputNilaiBahanBaku" class="form-label">Nilai Bahan Baku</label>
            <input type="text" class="form-control" name="nilai_bahan_baku" id="inputNilaiBahanBaku" value="{{ $data_edit->nilai_bahan_baku }}">
          </div>
          <div class="col-md-6">
            <label for="inputBahanPenolong" class="form-label">Bahan Penolong</label>
            <input type="text" class="form-control" name="bahan_penolong" id="inputBahanPenolong" value="{{ $data_edit->bahan_penolong }}">
          </div>
          <div class="col-md-6">
            <label for="inputNilaiBahanPenolong" class="form-label">Nilai Bahan Penolong</label>
            <input type="text" class="form-control" name="nilai_bahan_penolong" id="inputNilaiBahanPenolong" value="{{ $data_edit->nilai_bahan_penolong }}">
          </div>
          <div class="col-md-6">
            <label for="inputNilaiMesin" class="form-label">Nilai Mesin/Peralatan</label>
            <input type="text" class="form-control" name="nilai_mesin_peralatan" id="inputNilaiMesin" value="{{ $data_edit->nilai_mesin_peralatan }}">
          </div>
          <div class="col-md-6">
            <label for="inputNilaiModal" class="form-label">Nilai Modal Kerja</label>
            <input type="text" class="form-control" name="nilai_modal_kerja" id="inputNilaiModal" value="{{ $data_edit->nilai_modal_kerja }}">
          </div>
          <div class="col-md-3">
            <label for="inputAksesBahan" class="form-label">Akses Bahan Baku</label>
            <select id="inputAksesBahan" class="form-select" name="akses_bahan">
              <?php foreach ($akses_bahan as $a) : 
                if ($data_edit->ketersediaan_id == $a['id_ketersediaan']) : ?>
                    <option value="{{ $a['id_ketersediaan'] }}" selected>{{ $a['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $a['id_ketersediaan'] }}">{{ $a['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputBahanTerbuang" class="form-label">Jumlah Bahan Terbuang</label>
            <select id="inputBahanTerbuang" class="form-select" name="jumlah_bahan_baku_terbuang">
              <?php foreach ($jumlah_bahan_baku_terbuang as $buang) : 
                if ($data_edit->bahan_baku_terbuang_id == $buang['id_bahan_terbuang']) : ?>
                    <option value="{{ $buang['id_bahan_terbuang'] }}" selected>{{ $buang['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $buang['id_bahan_terbuang'] }}">{{ $buang['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputProdukCacat" class="form-label">Jumlah Produk Cacat</label>
            <select id="inputProdukCacat" class="form-select" name="jumlah_produk_cacat">
              <?php foreach ($jumlah_produk_cacat as $cacat) : 
                if ($data_edit->produk_cacat_id == $cacat['id_produk_cacat']) : ?>
                    <option value="{{ $cacat['id_produk_cacat'] }}" selected>{{ $cacat['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $cacat['id_produk_cacat'] }}">{{ $cacat['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-3">
            <label for="inputMesin" class="form-label">Peralatan Produksi</label>
            <select id="inputMesin" class="form-select" name="mesin_peralatan_industri">
              <?php foreach ($mesin_peralatan_industri as $mesin) : 
                if ($data_edit->mesin_id == $mesin['id_mesin']) : ?>
                    <option value="{{ $mesin['id_mesin'] }}" selected>{{ $mesin['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $mesin['id_mesin'] }}">{{ $mesin['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <label for="inputNamaMesin" class="form-label">Nama Mesin</label>
          <input type="text" class="form-control" name="nama_mesin" id="inputNamaMesin" value="{{ $data_edit->nama_mesin }}">
        </div>
        <div class="mb-3">
          <label for="inputVolumeProduksi" class="form-label">Volume Produksi</label>
          <input type="text" class="form-control" name="volume_produksi" id="inputVolumeProduksi" value="{{ $data_edit->volume_mesin }}">
        </div>
        <div class="mb-3">
          <label for="inputHargaSatuan" class="form-label">Harga Satuan</label>
          <input type="text" class="form-control" name="harga_satuan" id="inputHargaSatuan" value="{{ $data_edit->harga_satuan }}">
        </div>
        <div class="mb-3">
          <label for="inputNilaiProduksiTotal" class="form-label">Nilai Produksi Total</label>
          <input type="text" class="form-control" name="nilai_produksi_total" id="inputNilaiProduksiTotal" value="{{ $data_edit->nilai_produksi_total }}">
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="inputPengelolaan" class="form-label">Pengelolaan Keuangan</label>
            <select id="inputPengelolaan" class="form-select" name="pengelolaan_keuangan">
              <?php foreach ($pengelolaan_keuangan as $kelola) : 
                if ($data_edit->pengelolaan_id == $kelola['id_pengelolaan']) : ?>
                    <option value="{{ $kelola['id_pengelolaan'] }}" selected>{{ $kelola['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $kelola['id_pengelolaan'] }}">{{ $kelola['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputPencatatan" class="form-label">Pencatatan Keuangan</label>
            <select id="inputPencatatan" class="form-select" name="jenis_pencatatan_keuangan">              
              <?php foreach ($jenis_pencatatan_keuangan as $catat) : 
                if ($data_edit->pencatatan_id == $catat['id_pencatatan']) : ?>
                    <option value="{{ $catat['id_pencatatan'] }}" selected>{{ $catat['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $catat['id_pencatatan'] }}">{{ $catat['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputAksesModal" class="form-label">Akses Modal</label>
            <select id="inputAksesModal" class="form-select" name="id_akses_modal">
              <?php foreach ($id_akses_modal as $am) : 
                if ($data_edit->akses_modal_id == $am['id_akses_modal']) : ?>
                    <option value="{{ $am['id_akses_modal'] }}" selected>{{ $am['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $am['id_akses_modal'] }}">{{ $am['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputPertumbuhan" class="form-label">Pertumbuhan Penjualan</label>
            <select id="inputPertumbuhan" class="form-select" name="pertumbuhan_penjualan">
              <?php foreach ($pertumbuhan_penjualan as $tumbuh) : 
                if ($data_edit->pertumbuhan_id == $tumbuh['id_pertumbuhan_penjualan']) : ?>
                    <option value="{{ $tumbuh['id_pertumbuhan_penjualan'] }}" selected>{{ $tumbuh['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $tumbuh['id_pertumbuhan_penjualan'] }}">{{ $tumbuh['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputCaraPenjualan" class="form-label">Cara Penjualan</label>
            <select id="inputCaraPenjualan" class="form-select" name="cara_penjualan">
              <?php foreach ($cara_penjualan as $jual) : 
                if ($data_edit->cara_penjualan_id == $jual['id_cara_jual']) : ?>
                    <option value="{{ $jual['id_cara_jual'] }}" selected>{{ $jual['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $jual['id_cara_jual'] }}">{{ $jual['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputAreaPemasaran" class="form-label">Area Pemasaran</label>
            <select id="inputAreaPemasaran" class="form-select" name="area_pemasaran">
              <?php foreach ($area_pemasaran as $area) : 
                if ($data_edit->area_pemasaran_id == $area['id_area_pemasaran']) : ?>
                    <option value="{{ $area['id_area_pemasaran'] }}" selected>{{ $area['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $area['id_area_pemasaran'] }}">{{ $area['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputPemasaranOnline" class="form-label">Pemasaran Online</label>
            <select id="inputPemasaranOnline" class="form-select" name="pemasaran_online">
              <?php foreach ($pemasaran_online as $pemasaran) : 
                if ($data_edit->pemasaran_id == $pemasaran['id_pemasaran']) : ?>
                    <option value="{{ $pemasaran['id_pemasaran'] }}" selected>{{ $pemasaran['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $pemasaran['id_pemasaran'] }}">{{ $pemasaran['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputNegara" class="form-label">Negara Ekspor</label>
            <input type="text" class="form-control" name="negara_ekspor" id="inputNegara" value="{{ $data_edit->negara_ekspor }}">
          </div>
          <div class="col-md-6">
            <label for="inputKeterlambatan" class="form-label">Frekuensi Keterlambatan Pengiriman (setahun) </label>
            <select id="inputKeterlambatan" class="form-select" name="frekuensi_keterlambatan">
              <?php foreach ($frekuensi_keterlambatan as $terlambat) : 
                if ($data_edit->keterlambatan_id == $terlambat['id_keterlambatan']) : ?>
                    <option value="{{ $terlambat['id_keterlambatan'] }}" selected>{{ $terlambat['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $terlambat['id_keterlambatan'] }}">{{ $terlambat['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputKomplain" class="form-label">Frekuensi Produk Dikomplain/Ditolak</label>
            <select id="inputKomplain" class="form-select" name="frekuensi_komplain">
              <?php foreach ($frekuensi_komplain as $komplain) : 
                if ($data_edit->komplain_id == $komplain['id_komplain']) : ?>
                    <option value="{{ $komplain['id_komplain'] }}" selected>{{ $komplain['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $komplain['id_komplain'] }}">{{ $komplain['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputEnergi" class="form-label">Jenis Energi</label>
            <select id="inputEnergi" class="form-select" name="energi">
              <?php foreach ($energi as $e) : 
                if ($data_edit->energi_id == $e['id_energi']) : ?>
                    <option value="{{ $e['id_energi'] }}" selected>{{ $e['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $e['id_energi'] }}">{{ $e['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="inputDaya" class="form-label">Daya perbulan (watt/liter/kubik)</label>
            <input type="text" class="form-control" name="daya_energi" id="inputDaya" value="{{ $data_edit->daya_energi }}">
          </div>
          <div class="col-md-6">
            <label for="inputLimbah" class="form-label">Limbah yang dihasilkan</label>
            <input type="text" class="form-control" name="limbah" id="inputLimbah" value="{{ $data_edit->limbah }}">
          </div>
          <div class="col-md-6">
            <label for="inputOlahanLimbah" class="form-label">Olahan Limbah</label>
            <input type="text" class="form-control" name="olahan_limbah" id="inputOlahanLimbah" value="{{ $data_edit->olahan_limbah }}">
          </div>
          <div class="col-md-6">
            <label for="inputJumlahLimbah" class="form-label">Jumlah Limbah</label>
            <input type="text" class="form-control" name="jumlah_limbah" id="inputJumlahLimbah" value="{{ $data_edit->jumlah_limbah }}">
          </div>
          <div class="col-md-6">
            <label for="inputSatuanLimbah" class="form-label">Satuan Limbah</label>
            <input type="text" class="form-control" name="satuan_limbah" id="inputSatuanLimbah" value="{{ $data_edit->satuan_limbah }}">
          </div>
        </div>
        <div class="mb-3">
          <label for="inputTenagaDesainer" class="form-label">Tenaga Desainer atau R&D</label>
          <select id="inputTenagaDesainer" class="form-select" name="tenaga_desainer">
            <?php foreach ($tenaga_desainer as $td) : 
                if ($data_edit->tenaga_desainer_id == $td['id_tenaga']) : ?>
                    <option value="{{ $td['id_tenaga'] }}" selected>{{ $td['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $td['id_tenaga'] }}">{{ $td['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputInovasi" class="form-label">Inovasi yang pernah dilakukan</label>
          <div>
            <snap>Inovasi terhadap Mesin</snap>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_mesin" id="BelumInovasiMesin" value="1" {{$data_edit->inovasi_mesin == '1'? 'checked' : ''}}>
              <label class="form-check-label" for="BelumInovasiMesin">Belum</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_mesin" id="SudahInovasiMesin" value="2" {{$data_edit->inovasi_mesin == '2'? 'checked' : ''}}>
              <label class="form-check-label" for="SudahInovasiMesin">Sudah</label>
            </div>
          </div>
          <div>
            <snap>Inovasi terhadap Bahan</snap>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_bahan" id="BelumInovasiBahan" value="1" {{$data_edit->inovasi_bahan == '1'? 'checked' : ''}}>
              <label class="form-check-label" for="BelumInovasiBahan">Belum</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_bahan" id="SudahInovasiBahan" value="2" {{$data_edit->inovasi_bahan == '2'? 'checked' : ''}}>
              <label class="form-check-label" for="SudahInovasiBahan">Sudah</label>
            </div>
          </div>
          <div>
            <snap>Inovasi terhadap Produk</snap>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_produk" id="BelumInovasiProduk" value="1" {{$data_edit->inovasi_produk == '1'? 'checked' : ''}}>
              <label class="form-check-label" for="BelumInovasiProduk">Belum</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inovasi_produk" id="SudahInovasiProduk" value="2" {{$data_edit->inovasi_produk == '2'? 'checked' : ''}}>
              <label class="form-check-label" for="SudahInovasiProduk">Sudah</label>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="inputKomitmen" class="form-label">Komitmen Pimpinan Terhadap Kualitas</label>
          <select id="inputKomitmen" class="form-select" name="komitmen">
             <?php foreach ($komitmen as $k) : 
                if ($data_edit->komitmen_id == $k['id_komitmen']) : ?>
                    <option value="{{ $k['id_komitmen'] }}" selected>{{ $k['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $k['id_komitmen'] }}">{{ $k['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
          </select>
        </div>
        <br><br>
        <div class="card-footer">
          <div class="row">
            <div class="col-11 text-right">
              <a href="#step-1" class="btn btn-primary pull-right">Previous</a>
            </div>
            <div class="col-1 text-right">
              <a href="#step-3" class="btn btn-primary pull-right">Next</a>
            </div>
          </div>
        </div>
      </div>

      <div id="step-3" class="tab-pane" role="tabpanel" style="padding: 10px 30px 0 30px">
        <div class="mb-3">
          <label for="inputStandar" class="form-label">Standar Mutu Produk</label>
          <select id="inputStandar" class="form-select" name="standar_mutu_produk">
             <?php foreach ($standar_mutu_produk as $smp) : 
                if ($data_edit->standar_mutu_produk == $smp['id_standar_mutu']) : ?>
                    <option value="{{ $smp['id_standar_mutu'] }}" selected>{{ $smp['nama'] }}</option>
                  <?php
                  else :?>
                    <option value="{{ $smp['id_standar_mutu'] }}">{{ $smp['nama'] }}</option>
                  <?php
                  endif;
              endforeach; ?>
          </select>
        </div>
        <br>
        <div>
          <label>Sertifikat Produk</label>
          <?php foreach ($administrasi_legalitas_standardisasi as $adm) :
            $done = false;
          ?>
            <?php foreach ($data_edit_sertifikat as $des) :
              if ($des->nama == $adm->nama) :
                $done = true;
            ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $des->id_administrasi }}" name="administrasi[{{ $des->id_administrasi }}][id]" id="legalitas{{ $des->id_administrasi }}" checked>
                  <label class="form-check-label" for="legalitas{{ $des->id_administrasi }}">
                    {{ $des->nama }}
                  </label>
                  <input type="text" class="form-control" id="inputAdministrasi{{ $des->id_administrasi }}" name="administrasi[{{ $des->id_administrasi }}][nomor]" placeholder="Nomor" value="{{ $des->nomor_sertifikat }}">
                  <input class="form-control" type="file" name="administrasi[{{ $des->id_administrasi }}][dokumen]" id="inputAdministrasi{{ $des->id_administrasi }}" value="{{ $des->dokumen_sertifikat }}">current file : <a href="{{ URL::to('/') }}/dokumen_sertifikat/{{ $des->dokumen_sertifikat }}" target="_blank">{{ $des->dokumen_sertifikat }}</a>
                </div>
              <?php
                break;
              endif;
            endforeach;
            if (!$done) :
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $adm['id_administrasi'] }}" name="administrasi[{{ $adm['id_administrasi'] }}][id]" id="legalitas{{ $adm['id_administrasi'] }}">
                <label class="form-check-label" for="legalitas{{ $adm['id_administrasi'] }}">
                  {{ $adm['nama'] }}
                </label>
                <input type="text" class="form-control" id="inputAdministrasi{{ $adm['id_administrasi'] }}" name="administrasi[{{ $adm['id_administrasi'] }}][nomor]" placeholder="Nomor">
                <input class="form-control" type="file" name="administrasi[{{ $adm['id_administrasi'] }}][dokumen]" id="inputAdministrasi{{ $adm['id_administrasi'] }}">
              </div>
            <?php
            endif;
            ?>
          <?php endforeach; ?>
        </div>
        <br><br>
        <div class="card-footer">
          <div class="row">
            <div class="col-11 text-right">
              <a href="#step-2" class="btn btn-primary pull-right">Previous</a>
            </div>
            <div class="col-1 text-right">
              <a href="#step-4" class="btn btn-primary pull-right">Next</a>
            </div>
          </div>
        </div>
      </div>

      <div id="step-4" class="tab-pane" role="tabpanel" style="padding: 10px 30px 0 30px">
        <div class="mb-3">
          <label>Pameran</label>
          <?php foreach ($pameran as $pam) :
            $done = false;
          ?>
            <?php foreach ($data_edit_pameran as $dep) :
              if ($dep->id_pameran == $pam->id_pameran) :
                $done = true;
            ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $dep->id_pameran }}" name="pameran[{{ $dep->id_pameran }}][id]" id="fasilitas{{ $dep->id_pameran }}" checked>
                  <label class="form-check-label" for="fasilitas{{ $dep->id_pameran }}">
                    {{ $dep->nama }}
                  </label>
                  <input type="text" class="form-control" id="inputPameran{{ $dep->id_pameran }}" name="pameran[{{ $dep->id_pameran }}][name]" placeholder="Nama" value="{{$dep->nama_pameran}}">
                  <input class="form-control" type="file" name="pameran[{{ $dep->id_pameran }}][dokumen]" id="inputPameran{{ $dep->id_pameran }}" value="{{ $dep->dokumen_pameran }}">current file : <a href="{{ URL::to('/') }}/dokumen_pameran/{{ $dep->dokumen_pameran }}" target="_blank">{{ $dep->dokumen_pameran }}</a>
                </div>
              <?php
                break;
              endif;
            endforeach;
            if (!$done) :
              ?>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $pam['id_pameran'] }}" name="pameran[{{ $pam['id_pameran'] }}][id]" id="fasilitas{{ $pam['id_pameran'] }}">
                <label class="form-check-label" for="fasilitas{{ $pam['id_pameran'] }}">
                  {{ $pam['nama'] }}
                </label>
                <input type="text" class="form-control" id="inputPameran{{ $pam['id_pameran'] }}" name="pameran[{{ $pam['id_pameran'] }}][name]" placeholder="Nama">
                <input class="form-control" type="file" name="pameran[{{ $pam['id_pameran'] }}][dokumen]" id="inputPameran{{ $pam['id_pameran'] }}">
              </div>
            <?php
            endif;
            ?>
          <?php endforeach; ?>
        </div> <br>
        <div id="pelatihan">
          <label>Pelatihan Manajemen Mutu</label>
          <button type="button" class="btn btn-primary btn-sm" id="addPelatihan">+</button>
          <?php foreach ($data_edit_pelatihan as $depe) : ?>
            <div class="input-group" style="margin-bottom: 10px;">
              <input type="text" aria-label="NamaPelatihan" name="nama_pelatihan[]" value="{{ $depe->nama_pelatihan }}" class="form-control col-md-7" placeholder="Nama Pelatihan">
              <input class="form-control col-md-5" type="file" name="dokumen_pelatihan[]" id="formFile" value="{{ $depe->dokumen_pelatihan }}">current file : <a href="{{ URL::to('/') }}/dokumen_pelatihan/{{ $depe->dokumen_pelatihan }}" target="_blank">{{ $depe->dokumen_pelatihan }}</a> 
            </div>
            <?php endforeach; ?>
        </div>
        <div id="bantuanAlat">
          <label>Bantuan Alat</label>
          <button type="button" class="btn btn-primary btn-sm" id="addBantuanAlat">+</button>
          <?php foreach ($data_edit_bantuan_alat as $deba) : ?>
            <div class="input-group" style="margin-bottom: 10px;">
              <input type="text" aria-label="TahunAlat" name="tahun_alat[]" value="{{ $deba->tahun_alat }}" class="form-control col-md-1" placeholder="Tahun">
              <input type="text" aria-label="BentukAlat" name="bentuk_alat[]" value="{{ $deba->bentuk_alat }}" class="form-control" placeholder="Bentuk">
              <input class="form-control col-md-5" type="file" name="dokumen_alat[]" id="formFile" value="{{ $deba->dokumen_alat }}">current file : <a href="{{ URL::to('/') }}/dokumen_bantuan_alat/{{ $deba->dokumen_alat }}" target="_blank">{{ $deba->dokumen_alat }}</a>
            </div>
            <?php endforeach; ?>
        </div>
        <div id="bantuanBahan">
          <label>Bantuan Bahan</label>
          <button type="button" class="btn btn-primary btn-sm" id="addBantuanBahan">+</button>
          <?php foreach ($data_edit_bantuan_bahan as $debb) : ?>
            <div class="input-group" style="margin-bottom: 10px;">
              <input type="text" aria-label="TahunBahan" name="tahun_bahan[]" value="{{ $debb->tahun_bahan }}" class="form-control col-md-1" placeholder="Tahun">
              <input type="text" aria-label="BentukBahan" name="bentuk_bahan[]" value="{{ $debb->bentuk_bahan }}" class="form-control" placeholder="Bentuk">
              <input class="form-control col-md-5" type="file" name="dokumen_bahan[]" id="formFile" value="{{ $debb->dokumen_bahan }}">current file : <a href="{{ URL::to('/') }}/dokumen_bantuan_bahan/{{ $debb->dokumen_bahan }}" target="_blank">{{ $debb->dokumen_bahan }}</a>
            </div>
            <?php endforeach; ?>
        </div>
        <br><br>
        <div class="card-footer">
          <div class="row">
            <div class="col-10 text-right">
              <a href="#step-3" class="btn btn-primary pull-right">Previous</a>
            </div>
            <div class="col-2 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $(function() {
    $('#inputKecamatan').on('change', function() {
      axios.post("{{ route('getAjaxKelurahan') }}", {
          id: $(this).val()
        })
        .then(function(response) {
          $('#inputKelurahan').empty();
          $.each(response.data, function(id_kelurahan, nama) {
            $('#inputKelurahan').append(new Option(nama, id_kelurahan))
          })
        });
    });
  });
  $(function() {
    $('#inputKecamatanPemilik').on('change', function() {
      axios.post("{{ route('getAjaxKelurahan') }}", {
          id: $(this).val()
        })
        .then(function(response) {
          $('#inputKelurahanPemilik').empty();
          $.each(response.data, function(id_kelurahan, nama) {
            $('#inputKelurahanPemilik').append(new Option(nama, id_kelurahan))
          })
        });
    });
  });

  $(document).ready(function() {
    if ($('#inputKecamatan').val() != "") {
      axios.post("{{ route('getAjaxKelurahan') }}", {
          id: $('#inputKecamatan').val()
        })
        .then(function(response) {
          $('#inputKelurahan').empty();
          $.each(response.data, function(id_kelurahan, nama) {
            if ("{{ $data_edit->kelurahan_id }}" == id_kelurahan) {
              $('#inputKelurahan').append(new Option(nama, id_kelurahan, false, true))
            } else {
              $('#inputKelurahan').append(new Option(nama, id_kelurahan, false, false))
            }
          })
        });
    }
    if ($('#inputKecamatanPemilik').val() != "") {
      axios.post("{{ route('getAjaxKelurahan') }}", {
          id: $('#inputKecamatanPemilik').val()
        })
        .then(function(response) {
          $('#inputKelurahanPemilik').empty();
          $.each(response.data, function(id_kelurahan, nama) {
            if ("{{ $data_edit->kelurahan_id }}" == id_kelurahan) {
              $('#inputKelurahanPemilik').append(new Option(nama, id_kelurahan, false, true))
            } else {
              $('#inputKelurahanPemilik').append(new Option(nama, id_kelurahan, false, false))
            }
          })
        });
    }

    $('#addPelatihan').click(function() {
      var pelatihan = $(`  <div class="input-group" style="margin-bottom: 10px;">
                <input type="text" aria-label="NamaPelatihan" name="nama_pelatihan[]" class="form-control col-md-7" placeholder="Nama Pelatihan">
                <input class="form-control col-md-5" type="file" name="dokumen_pelatihan[]" id="formFile">
              </div>`)
      $('#pelatihan').append(pelatihan)
      var height = $(".tab-content").height();
      $(".tab-content").css("height", height + 50);
    })

    $('#addBantuanAlat').click(function() {
      var bantuanAlat = $(`  <div class="input-group" style="margin-bottom: 10px;">
                <input type="text" aria-label="TahunAlat" name="tahun_alat[]" class="form-control col-md-2" placeholder="Tahun">
                <input type="text" aria-label="BentukAlat" name="bentuk_alat[]" class="form-control" placeholder="Bentuk">
                <input class="form-control col-md-5" type="file" name="dokumen_alat[]" id="formFile">
              </div>`)
      $('#bantuanAlat').append(bantuanAlat)
      var height = $(".tab-content").height();
      $(".tab-content").css("height", height + 50);
    })

    $('#addBantuanBahan').click(function() {
      var bantuanBahan = $(`  <div class="input-group" style="margin-bottom: 10px;">
                <input type="text" aria-label="TahunBahan" name="tahun_bahan[]" class="form-control col-md-2" placeholder="Tahun">
                <input type="text" aria-label="BentukBahan" name="bentuk_bahan[]" class="form-control" placeholder="Bentuk">
                <input class="form-control col-md-5" type="file" name="dokumen_bahan[]" id="formFile">
              </div>`)
      $('#bantuanBahan').append(bantuanBahan)
      var height = $(".tab-content").height();
      $(".tab-content").css("height", height + 50);
    })
  });
</script>
@endsection