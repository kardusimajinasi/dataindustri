<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\AksesBahan;
use App\Models\BadanUsaha;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\TipeIndustri;
use App\Models\Skala;
use App\Models\IndustriKreatif;
use App\Models\PendidikanTenaga;
use App\Models\Investasi;
use App\Models\BahanBakuTerbuang;
use App\Models\ProdukCacat;
use App\Models\MesinProduksi;
use App\Models\PengelolaanKeuangan;
use App\Models\PencatatanKeuangan;
use App\Models\AksesModal;
use App\Models\PertumbuhanPenjualan;
use App\Models\CaraPenjualan;
use App\Models\AreaPemasaran;
use App\Models\PemasaranOnline;
use App\Models\FrekuensiKeterlambatan;
use App\Models\FrekuensiKomplain;
use App\Models\Energi;
use App\Models\TenagaDesainer;
use App\Models\Komitmen;
use App\Models\StandarProduk;
use App\Models\PelatihanManajemen;
use App\Models\DataPemilik;
use App\Models\DataPerusahaan;
use App\Models\TingkatKeterampilanTenaga;
use App\Models\KeikutsertaanBPJS;
use App\Models\AdministrasiLegalitasStandardisasi;
use App\Models\Pameran;
use App\Models\KBLI;
use App\Models\BantuanALat;
use App\Models\BantuanBahan;
use Exception;

class InputDataAdminController extends Controller
{
    //fungsi untuk menyimpan data dari db ke dalam bentuk array
    public function index()
    {
        $data = [];
        $data['akses_bahan'] = AksesBahan::all();
        $data['badan_usaha'] = BadanUsaha::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['kelurahan'] = Kelurahan::all();
        $data['kbli'] = KBLI::all();
        $data['tipe_industri'] = TipeIndustri::all();
        $data['skala_industri'] = Skala::all();
        $data['industri_kreatif'] = IndustriKreatif::all();
        $data['pendidikan_tenaga'] = PendidikanTenaga::all();
        $data['nilai_investasi'] = Investasi::all();
        $data['jumlah_bahan_baku_terbuang'] = BahanBakuTerbuang::all();
        $data['jumlah_produk_cacat'] = ProdukCacat::all();
        $data['mesin_peralatan_industri'] = MesinProduksi::all();
        $data['pengelolaan_keuangan'] = PengelolaanKeuangan::all();
        $data['jenis_pencatatan_keuangan'] = PencatatanKeuangan::all();
        $data['id_akses_modal'] = AksesModal::all();
        $data['pertumbuhan_penjualan'] = PertumbuhanPenjualan::all();
        $data['cara_penjualan'] = CaraPenjualan::all();
        $data['area_pemasaran'] = AreaPemasaran::all();
        $data['pemasaran_online'] = PemasaranOnline::all();
        $data['frekuensi_keterlambatan'] = FrekuensiKeterlambatan::all();
        $data['frekuensi_komplain'] = FrekuensiKomplain::all();
        $data['energi'] = Energi::all();
        $data['tenaga_desainer'] = TenagaDesainer::all();
        $data['komitmen'] = Komitmen::all();
        $data['standar_mutu_produk'] = StandarProduk::all();
        $data['pelatihan_manajemen_mutu'] = PelatihanManajemen::all();
        $data['tingkat_keterampilan_tenaga'] = TingkatKeterampilanTenaga::all();
        $data['keikutsertaan_bpjs'] = KeikutsertaanBPJS::all();
        $data['administrasi_legalitas_standardisasi'] = AdministrasiLegalitasStandardisasi::all();
        $data['pameran'] = Pameran::all();
        $data['bantuan_alat'] = BantuanAlat::all();
        $data['bantuan_bahan'] = BantuanBahan::all();

        return view('inputAdmin', $data);
    }

    //fungsi untuk menyimpan hasil input
    public function save(Request $request)
    {
        try {
            DB::beginTransaction();
            //mengambil data nik, nama, ..., npwp untuk disimpan di tabel data_pemilik
            $data_pemilik = DB::table('data_pemilik')->insertGetId([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'rt' => $request->input('rt'),
                'rw' => $request->input('rw'),
                'kodepos' => $request->input('kodepos'),
                'kecamatan_id' => $request->input('kecamatan'),
                'kelurahan_id' => $request->input('kelurahan'),
                'telepon' => $request->input('telepon'),
                'email' => $request->input('email'),
                'npwp' => $request->input('npwp')
            ]);

            //berfungsi untuk input foto, foto yang telah diinput akan dimasukkan ke folder logo. Nama file akan disamarkan menjadi angka random menggunakan time().rand(100,999)
            $namafile=null;
            $foto_perusahaan = $request->file('foto_perusahaan');
            if($foto_perusahaan!=null){
                $namafile = time().rand(100,999).".".$foto_perusahaan->getClientOriginalExtension();
                $foto_perusahaan->move(public_path().'/logo',$namafile);
            }
            //mengambil data foto_perusahaan, badan_usaha, ..., status untuk disimpan di tabel data_perusahaan
            $data_perusahaan = DB::table('data_perusahaan')->insertGetId([
                'id_pemilik' => $data_pemilik,
                'foto_perusahaan' => $namafile,
                'badan_usaha' => $request->input('badan_usaha'),
                'nama_perusahaan' => $request->input('nama_perusahaan'),
                'alamat_perusahaan' => $request->input('alamat_perusahaan'),
                'kecamatan_perusahaan' => $request->input('kecamatan_perusahaan'),
                'kelurahan_perusahaan' => $request->input('kelurahan_perusahaan'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'npwp_perusahaan' => $request->input('npwp_perusahaan'),
                'email_perusahaan' => $request->input('email_perusahaan'),
                'website' => $request->input('website'),
                'telepon_perusahaan' => $request->input('telepon_perusahaan'),
                'fax' => $request->input('fax'),
                'tipe_industri_id' => $request->input('tipe_industri'),
                'industri_kreatif_id' => $request->input('industri_kreatif'),
                'komoditas' => $request->input('komoditas'),
                'jenis_produk' => $request->input('jenis_produk'),
                'id_kbli' => $request->input('kbli'),
                'skala_id' => $request->input('skala_industri'),
                'izin_usaha' => $request->input('izin_usaha'),
                'tahun_izin' => $request->input('tahun_izin'),
                'jumlah_tenaga_lk' => $request->input('jumlah_tenaga_lk'),
                'jumlah_tenaga_pr' => $request->input('jumlah_tenaga_pr'),
                'pendidikan_tenaga_id' => $request->input('pendidikan_tenaga'),
                'investasi_id' => $request->input('nilai_investasi'),
                'omset' => $request->input('omset'),
                'bahan_baku' => $request->input('bahan_baku'),
                'nilai_bahan_baku' => $request->input('nilai_bahan_baku'),
                'bahan_penolong' => $request->input('bahan_penolong'),
                'nilai_bahan_penolong' => $request->input('nilai_bahan_penolong'),
                'nilai_mesin_peralatan' => $request->input('nilai_mesin_peralatan'),
                'nilai_modal_kerja' => $request->input('nilai_modal_kerja'),
                'ketersediaan_id' => $request->input('akses_bahan'),
                'bahan_baku_terbuang_id' => $request->input('jumlah_bahan_baku_terbuang'),
                'produk_cacat_id' => $request->input('jumlah_produk_cacat'),
                'mesin_id' => $request->input('mesin_peralatan_industri'),
                'nama_mesin' => $request->input('nama_mesin'),
                'volume_mesin' => $request->input('volume_produksi'),
                'harga_satuan' => $request->input('harga_satuan'),
                'nilai_produksi_total' => $request->input('nilai_produksi_total'),
                'pengelolaan_id' => $request->input('pengelolaan_keuangan'),
                'pencatatan_id' => $request->input('jenis_pencatatan_keuangan'),
                'akses_modal_id' => $request->input('id_akses_modal'),
                'pertumbuhan_id' => $request->input('pertumbuhan_penjualan'),
                'cara_penjualan_id' => $request->input('cara_penjualan'),
                'area_pemasaran_id' => $request->input('area_pemasaran'),
                'pemasaran_id' => $request->input('pemasaran_online'),
                'negara_ekspor' => $request->input('negara_ekspor'),
                'keterlambatan_id' => $request->input('frekuensi_keterlambatan'),
                'komplain_id' => $request->input('frekuensi_komplain'),
                'energi_id' => $request->input('energi'),
                'daya_energi' => $request->input('daya_energi'),
                'limbah' => $request->input('limbah'),
                'jumlah_limbah' => $request->input('jumlah_limbah'),
                'satuan_limbah' => $request->input('satuan_limbah'),
                'olahan_limbah' => $request->input('olahan_limbah'),
                'tenaga_desainer_id' => $request->input('tenaga_desainer'),
                'inovasi_mesin' => $request->input('inovasi_mesin'),
                'inovasi_bahan' => $request->input('inovasi_bahan'),
                'inovasi_produk' => $request->input('inovasi_produk'),
                'komitmen_id' => $request->input('komitmen'),
                'standar_mutu_produk' => $request->input('standar_mutu_produk'),
                'status' => 0,
            ]);
            //mengambil data yiatu keterampilan dan jumlahnya untuk di simpan dalam perusahaan_keterampilan. Data ini bersifat array karena admin dapat menginputkan banyak data.
            foreach ($request->input('keterampilan') as $tkt) {
                if (isset($tkt['id'])) {
                    $perusahaan_keterampilan = DB::table('perusahaan_keterampilan')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "keterampilan_id" => $tkt['id'],
                        "jumlah_keterampilan" => $tkt['jumlah']
                    ]);
                }
            }
    
            foreach ($request->input('bpjs') as $bpjs) {
                if (isset($bpjs['id'])) {
                    $perusahaan_bpjs = DB::table('perusahaan_bpjs')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "bpjs_id" => $bpjs['id'],
                        "jumlah_bpjs" => $bpjs['jumlah']
                    ]);
                }
            }
            //mengambil data yaitu id_sertifikat, nomor, dan dokumennya untuk disimpan di tabel perusahaan_sertifikat. Data ini bersifat array karena admin dapat menginputkan banyak data. 
            foreach ($request->input('administrasi') as $idx => $adm) {
                if (isset($adm['id'])) {
                    //berfungsi untuk menyimpan dokumen ke folder dokumen_sertifikat
                    $namadokumenADM = null;
                    $dokumen_sertifikat = isset($request->file('administrasi')[$idx])? $request->file('administrasi')[$idx]['dokumen'] : null;
                    if($dokumen_sertifikat!=null){
                        $namadokumenADM = time().rand(100,999).".".$dokumen_sertifikat->getClientOriginalExtension();
                        $dokumen_sertifikat->move(public_path().'/dokumen_sertifikat',$namadokumenADM);
                    }
                    $perusahaan_sertifikat = DB::table('perusahaan_sertifikat')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "sertifikat_id" => $adm['id'],
                        "nomor_sertifikat" => $adm['nomor'],
                        "dokumen_sertifikat" => $namadokumenADM
                    ]);
                }
            }

            foreach ($request->input('pameran') as $pam) {
                if (isset($pam['id'])) {
                    $namadokumenPAM = null;
                    $dokumen_pameran = $request->file('dokumen_pameran');
                    if($dokumen_pameran!=null){
                        $namadokumenPAM = time().rand(100,999).".".$dokumen_pameran->getClientOriginalExtension();
                        $dokumen_pameran->move(public_path().'/dokumen_pameran',$namadokumenPAM);
                        $dokumen_pameran[] = $namadokumenPAM;
                    }
                    $perusahaan_pameran = DB::table('perusahaan_pameran')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "pameran_id" => $pam['id'],
                        "nama_pameran" => $pam['name'],
                        "dokumen_pameran" => $namadokumenPAM
                    ]);
                }
            }

            $data_pel = $request->input('nama_pelatihan'); 
            $data_doc = $request->file('dokumen_pelatihan');
            if ($data_pel != null) {
                for ($i = 0; $i < count($data_pel); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_pelatihan',$dokumen);
                    }
                    $perusahaan_pelatihan = DB::table('perusahaan_pelatihan')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "nama_pelatihan" => $data_pel[$i],
                        "dokumen_pelatihan" => $dokumen
                    ]);
                }
            }

            $data_baa = $request->input('tahun_alat');
            $data_bentuk = $request->input('bentuk_alat');
            $data_doc = $request->file('dokumen_alat');
            if ($data_baa != null) {
                for ($i = 0; $i < count($data_baa); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_bantuan_alat',$dokumen);
                    }
                    $perusahaan_bantuan_alat = DB::table('perusahaan_bantuan_alat')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "tahun_alat" => $data_baa[$i],
                        "bentuk_alat" => $data_bentuk[$i],
                        "dokumen_alat" => $dokumen
                    ]);
                }
            }
            $data_bah = $request->input('tahun_bahan');
            $data_bentuk = $request->input('bentuk_bahan');
            $data_doc = $request->file('dokumen_bahan');
            if ($data_bah != null) {
                for ($i = 0; $i < count($data_bah); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_bantuan_bahan',$dokumen);
                    }
                    $perusahaan_bantuan_bahan = DB::table('perusahaan_bantuan_bahan')->insert([
                        "perusahaan_id" => $data_perusahaan,
                        "tahun_bahan" => $data_bah[$i],
                        "bentuk_bahan" => $data_bentuk[$i],
                        "dokumen_bahan" => $dokumen
                    ]);
                }
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }
        return redirect('admin/home');
    }

    public function input()
    {
        return view('input');
    }

    // kelurahan akan menyesuaikan kecamatan yang dipilih
    public function kelurahan(Request $request)
    {
        $kelurahan = Kelurahan::where('id_kecamatan', $request->get('id'))
            ->pluck('nama', 'id_kelurahan');

        return response()->json($kelurahan);
    }

    //menampilkan data yang telah diinput oleh user, admin, maupun superadmin dengan status 0 (belum diverifikasi)
    public function data($id_perusahaan=null)
    {
        if($id_perusahaan!=null){
            $data = DB::table('data_perusahaan')
                ->where("id_perusahaan", "=", $id_perusahaan)
                ->update(["status" => 0]); //belum diverifikasi
        }

        $data = DB::table('data_pemilik')
            ->join('data_perusahaan', 'data_perusahaan.id_pemilik', '=', 'data_pemilik.id_pemilik')
            ->select('data_pemilik.*', 'data_perusahaan.*')
            ->where('data_perusahaan.status', '=', '0')
            ->get();
        return view('dataAdmin', compact('data'));
    }
    
   //menampilkan detail dari data yang telah diinput
    public function show($id_perusahaan)
    {
            $data = DB::table('data_perusahaan')
            ->leftJoin('data_pemilik', 'data_pemilik.id_pemilik', '=', 'data_perusahaan.id_pemilik')
            ->leftJoin('perusahaan_keterampilan', 'perusahaan_keterampilan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('tingkat_keterampilan_tenaga', 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')
            ->leftJoin('perusahaan_bpjs', 'perusahaan_bpjs.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('keikutsertaan_bpjs', 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')
            ->leftJoin('perusahaan_sertifikat', 'perusahaan_sertifikat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('administrasi_legalitas_standardisasi', 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')
            ->leftJoin('perusahaan_pameran', 'perusahaan_pameran.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('pameran', 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')
            ->leftJoin('perusahaan_pelatihan', 'perusahaan_pelatihan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_alat', 'perusahaan_bantuan_alat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_bahan', 'perusahaan_bantuan_bahan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')

            ->leftJoin('badan_usaha', 'badan_usaha.id_badan_usaha', '=', 'data_perusahaan.badan_usaha')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_perusahaan.kecamatan_perusahaan')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_perusahaan.kelurahan_perusahaan')
            ->leftJoin('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
            ->leftJoin('industri_kreatif', 'industri_kreatif.id_industri_kreatif', '=', 'data_perusahaan.industri_kreatif_id')
            ->leftJoin('kbli', 'kbli.id_kbli', '=', 'data_perusahaan.id_kbli')
            ->leftJoin('skala_industri', 'skala_industri.id_skala', '=', 'data_perusahaan.skala_id')
            ->leftJoin('pendidikan_tenaga', 'pendidikan_tenaga.id_pendidikan', '=', 'data_perusahaan.pendidikan_tenaga_id')
            ->leftJoin('nilai_investasi', 'nilai_investasi.id_investasi', '=', 'data_perusahaan.investasi_id')
            ->leftJoin('akses_bahan', 'akses_bahan.id_ketersediaan', '=', 'data_perusahaan.ketersediaan_id')
            ->leftJoin('jumlah_bahan_baku_terbuang', 'jumlah_bahan_baku_terbuang.id_bahan_terbuang', '=', 'data_perusahaan.bahan_baku_terbuang_id')
            ->leftJoin('jumlah_produk_cacat', 'jumlah_produk_cacat.id_produk_cacat', '=', 'data_perusahaan.produk_cacat_id')
            ->leftJoin('mesin_peralatan_industri', 'mesin_peralatan_industri.id_mesin', '=', 'data_perusahaan.mesin_id')
            ->leftJoin('pengelolaan_keuangan', 'pengelolaan_keuangan.id_pengelolaan', '=', 'data_perusahaan.pengelolaan_id')
            ->leftJoin('jenis_pencatatan_keuangan', 'jenis_pencatatan_keuangan.id_pencatatan', '=', 'data_perusahaan.pencatatan_id')
            ->leftJoin('id_akses_modal', 'id_akses_modal.id_akses_modal', '=', 'data_perusahaan.akses_modal_id')
            ->leftJoin('pertumbuhan_penjualan', 'pertumbuhan_penjualan.id_pertumbuhan_penjualan', '=', 'data_perusahaan.pertumbuhan_id')
            ->leftJoin('cara_penjualan', 'cara_penjualan.id_cara_jual', '=', 'data_perusahaan.cara_penjualan_id')
            ->leftJoin('area_pemasaran', 'area_pemasaran.id_area_pemasaran', '=', 'data_perusahaan.area_pemasaran_id')
            ->leftJoin('pemasaran_online', 'pemasaran_online.id_pemasaran', '=', 'data_perusahaan.pemasaran_id')
            ->leftJoin('frekuensi_keterlambatan', 'frekuensi_keterlambatan.id_keterlambatan', '=', 'data_perusahaan.keterlambatan_id')
            ->leftJoin('frekuensi_komplain', 'frekuensi_komplain.id_komplain', '=', 'data_perusahaan.komplain_id')
            ->leftJoin('energi', 'energi.id_energi', '=', 'data_perusahaan.energi_id')
            ->leftJoin('tenaga_desainer', 'tenaga_desainer.id_tenaga', '=', 'data_perusahaan.tenaga_desainer_id')
            ->leftJoin('standar_mutu_produk', 'standar_mutu_produk.id_standar_mutu', '=', 'data_perusahaan.standar_mutu_produk')
            ->leftJoin('komitmen', 'komitmen.id_komitmen', '=', 'data_perusahaan.komitmen_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select(
                'data_pemilik.*',
                'data_perusahaan.*',
                'perusahaan_keterampilan.*',
                'perusahaan_bpjs.*',
                'perusahaan_sertifikat.*',
                'perusahaan_pameran.*',
                'perusahaan_bantuan_alat.*',
                'perusahaan_bantuan_bahan.*',
                'perusahaan_pelatihan.*',
                'keikutsertaan_bpjs.nama as status_bpjs',
                'pameran.nama as status_pameran',
                'tingkat_keterampilan_tenaga.nama as status_keterampilan',
                'data_pemilik.id_pemilik as id_pemilik_perusahaan',
                'administrasi_legalitas_standardisasi.nama as status_sertifikat',
                'badan_usaha.nama as status_usaha', 'kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan', 'tipe_industri.nama as status_industri', 'industri_kreatif.nama as status_kreatif', 'kbli.nama as nama_kbli', 'skala_industri.nama as nama_skala', 'pendidikan_tenaga.nama as nama_pendidikan', 'nilai_investasi.nama as status_investasi', 'akses_bahan.nama as status_akses', 'jumlah_bahan_baku_terbuang.nama as jumlah_terbuang', 'jumlah_produk_cacat.nama as jumlah_cacat', 'mesin_peralatan_industri.nama as status_mesin', 'pengelolaan_keuangan.nama as status_pengelolaan', 'jenis_pencatatan_keuangan.nama as status_pencatatan', 'id_akses_modal.nama as status_modal', 'pertumbuhan_penjualan.nama as jumlah_pertumbuhan', 'cara_penjualan.nama as cara_jual', 'area_pemasaran.nama as area', 'pemasaran_online.nama as online', 'frekuensi_keterlambatan.nama as jumlah_terlambat', 'frekuensi_komplain.nama as jumlah_komplain', 'energi.nama as nama_energi', 'tenaga_desainer.nama as desainer', 'komitmen.nama as status_komitmen', 'standar_mutu_produk.nama as status_standar')
            ->first();

            $data_keterampilan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_keterampilan', 'perusahaan_keterampilan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('tingkat_keterampilan_tenaga', 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('tingkat_keterampilan_tenaga.nama', 'perusahaan_keterampilan.jumlah_keterampilan')
            ->get();

            $data_bpjs =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bpjs', 'perusahaan_bpjs.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('keikutsertaan_bpjs', 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('keikutsertaan_bpjs.nama', 'perusahaan_bpjs.jumlah_bpjs')
            ->get();

            $data_sertifikat =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_sertifikat', 'perusahaan_sertifikat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('administrasi_legalitas_standardisasi', 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('administrasi_legalitas_standardisasi.nama', 'perusahaan_sertifikat.nomor_sertifikat', 'perusahaan_sertifikat.dokumen_sertifikat')
            ->get();

            $data_pameran =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_pameran', 'perusahaan_pameran.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('pameran', 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('pameran.nama', 'perusahaan_pameran.nama_pameran', 'perusahaan_pameran.dokumen_pameran')
            ->get();

            $data_pelatihan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_pelatihan', 'perusahaan_pelatihan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_pelatihan.nama_pelatihan', 'perusahaan_pelatihan.dokumen_pelatihan')
            ->get();

            $data_bantuan_alat =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bantuan_alat', 'perusahaan_bantuan_alat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_bantuan_alat.tahun_alat', 'perusahaan_bantuan_alat.bentuk_alat', 'perusahaan_bantuan_alat.dokumen_alat')
            ->get();

            $data_bantuan_bahan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bantuan_bahan', 'perusahaan_bantuan_bahan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_bantuan_bahan.tahun_bahan', 'perusahaan_bantuan_bahan.bentuk_bahan', 'perusahaan_bantuan_bahan.dokumen_bahan')
            ->get();

            $data_pemilik = DB::table('data_pemilik')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_pemilik.kelurahan_id')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_pemilik.kecamatan_id')
            ->where('data_pemilik.id_pemilik', '=', $data->id_pemilik_perusahaan)
            ->select('kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan')
            ->first();

        return view('detailAdmin', compact('data', 'data_pemilik', 'data_keterampilan', 'data_bpjs', 'data_sertifikat', 'data_pameran', 'data_pelatihan', 'data_bantuan_alat', 'data_bantuan_bahan'));
    }

    //fungsi edit akan menampilkan data yang telah diinput yang nantinya admin dapat melakukan edit (ubah data). data disimpan dalam array agar memudahkan pemanggilan
   public function edit($id_perusahaan)
    {
        $data = [];
        $data['id_perusahaan'] = $id_perusahaan;
        $data['akses_bahan'] = AksesBahan::all();
        $data['badan_usaha'] = BadanUsaha::all();
        $data['kecamatan'] = Kecamatan::all();
        $data['kelurahan'] = Kelurahan::all();
        $data['kbli'] = KBLI::all();
        $data['tipe_industri'] = TipeIndustri::all();
        $data['skala_industri'] = Skala::all();
        $data['industri_kreatif'] = IndustriKreatif::all();
        $data['pendidikan_tenaga'] = PendidikanTenaga::all();
        $data['nilai_investasi'] = Investasi::all();
        $data['jumlah_bahan_baku_terbuang'] = BahanBakuTerbuang::all();
        $data['jumlah_produk_cacat'] = ProdukCacat::all();
        $data['mesin_peralatan_industri'] = MesinProduksi::all();
        $data['pengelolaan_keuangan'] = PengelolaanKeuangan::all();
        $data['jenis_pencatatan_keuangan'] = PencatatanKeuangan::all();
        $data['id_akses_modal'] = AksesModal::all();
        $data['pertumbuhan_penjualan'] = PertumbuhanPenjualan::all();
        $data['cara_penjualan'] = CaraPenjualan::all();
        $data['area_pemasaran'] = AreaPemasaran::all();
        $data['pemasaran_online'] = PemasaranOnline::all();
        $data['frekuensi_keterlambatan'] = FrekuensiKeterlambatan::all();
        $data['frekuensi_komplain'] = FrekuensiKomplain::all();
        $data['energi'] = Energi::all();
        $data['tenaga_desainer'] = TenagaDesainer::all();
        $data['komitmen'] = Komitmen::all();
        $data['standar_mutu_produk'] = StandarProduk::all();
        $data['pelatihan_manajemen_mutu'] = PelatihanManajemen::all();
        $data['tingkat_keterampilan_tenaga'] = TingkatKeterampilanTenaga::all();
        $data['keikutsertaan_bpjs'] = KeikutsertaanBPJS::all();
        $data['administrasi_legalitas_standardisasi'] = AdministrasiLegalitasStandardisasi::all();
        $data['pameran'] = Pameran::all();
        $data['bantuan_alat'] = BantuanAlat::all();
        $data['bantuan_bahan'] = BantuanBahan::all();
         $data['data_edit'] = DB::table('data_perusahaan')
            ->leftJoin('data_pemilik', 'data_pemilik.id_pemilik', '=', 'data_perusahaan.id_pemilik')
            ->leftJoin('perusahaan_keterampilan', 'perusahaan_keterampilan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('tingkat_keterampilan_tenaga', 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')
            ->leftJoin('perusahaan_bpjs', 'perusahaan_bpjs.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('keikutsertaan_bpjs', 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')
            ->leftJoin('perusahaan_sertifikat', 'perusahaan_sertifikat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('administrasi_legalitas_standardisasi', 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')
            ->leftJoin('perusahaan_pameran', 'perusahaan_pameran.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('pameran', 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')
            ->leftJoin('perusahaan_pelatihan', 'perusahaan_pelatihan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_alat', 'perusahaan_bantuan_alat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_bahan', 'perusahaan_bantuan_bahan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')

            ->leftJoin('badan_usaha', 'badan_usaha.id_badan_usaha', '=', 'data_perusahaan.badan_usaha')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_perusahaan.kecamatan_perusahaan')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_perusahaan.kelurahan_perusahaan')
            ->leftJoin('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
            ->leftJoin('industri_kreatif', 'industri_kreatif.id_industri_kreatif', '=', 'data_perusahaan.industri_kreatif_id')
            ->leftJoin('kbli', 'kbli.id_kbli', '=', 'data_perusahaan.id_kbli')
            ->leftJoin('skala_industri', 'skala_industri.id_skala', '=', 'data_perusahaan.skala_id')
            ->leftJoin('pendidikan_tenaga', 'pendidikan_tenaga.id_pendidikan', '=', 'data_perusahaan.pendidikan_tenaga_id')
            ->leftJoin('nilai_investasi', 'nilai_investasi.id_investasi', '=', 'data_perusahaan.investasi_id')
            ->leftJoin('akses_bahan', 'akses_bahan.id_ketersediaan', '=', 'data_perusahaan.ketersediaan_id')
            ->leftJoin('jumlah_bahan_baku_terbuang', 'jumlah_bahan_baku_terbuang.id_bahan_terbuang', '=', 'data_perusahaan.bahan_baku_terbuang_id')
            ->leftJoin('jumlah_produk_cacat', 'jumlah_produk_cacat.id_produk_cacat', '=', 'data_perusahaan.produk_cacat_id')
            ->leftJoin('mesin_peralatan_industri', 'mesin_peralatan_industri.id_mesin', '=', 'data_perusahaan.mesin_id')
            ->leftJoin('pengelolaan_keuangan', 'pengelolaan_keuangan.id_pengelolaan', '=', 'data_perusahaan.pengelolaan_id')
            ->leftJoin('jenis_pencatatan_keuangan', 'jenis_pencatatan_keuangan.id_pencatatan', '=', 'data_perusahaan.pencatatan_id')
            ->leftJoin('id_akses_modal', 'id_akses_modal.id_akses_modal', '=', 'data_perusahaan.akses_modal_id')
            ->leftJoin('pertumbuhan_penjualan', 'pertumbuhan_penjualan.id_pertumbuhan_penjualan', '=', 'data_perusahaan.pertumbuhan_id')
            ->leftJoin('cara_penjualan', 'cara_penjualan.id_cara_jual', '=', 'data_perusahaan.cara_penjualan_id')
            ->leftJoin('area_pemasaran', 'area_pemasaran.id_area_pemasaran', '=', 'data_perusahaan.area_pemasaran_id')
            ->leftJoin('pemasaran_online', 'pemasaran_online.id_pemasaran', '=', 'data_perusahaan.pemasaran_id')
            ->leftJoin('frekuensi_keterlambatan', 'frekuensi_keterlambatan.id_keterlambatan', '=', 'data_perusahaan.keterlambatan_id')
            ->leftJoin('frekuensi_komplain', 'frekuensi_komplain.id_komplain', '=', 'data_perusahaan.komplain_id')
            ->leftJoin('energi', 'energi.id_energi', '=', 'data_perusahaan.energi_id')
            ->leftJoin('tenaga_desainer', 'tenaga_desainer.id_tenaga', '=', 'data_perusahaan.tenaga_desainer_id')
            ->leftJoin('standar_mutu_produk', 'standar_mutu_produk.id_standar_mutu', '=', 'data_perusahaan.standar_mutu_produk')
            ->leftJoin('komitmen', 'komitmen.id_komitmen', '=', 'data_perusahaan.komitmen_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select(
                'data_pemilik.*',
                'data_perusahaan.*',
                'perusahaan_keterampilan.*',
                'perusahaan_bpjs.*',
                'perusahaan_sertifikat.*',
                'perusahaan_pameran.*',
                'perusahaan_bantuan_alat.*',
                'perusahaan_bantuan_bahan.*',
                'perusahaan_pelatihan.*',
                'keikutsertaan_bpjs.nama as status_bpjs',
                'pameran.nama as status_pameran',
                'tingkat_keterampilan_tenaga.nama as status_keterampilan',
                'data_pemilik.id_pemilik as id_pemilik_perusahaan',
                'administrasi_legalitas_standardisasi.nama as status_sertifikat',
                'badan_usaha.nama as status_usaha', 'kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan', 'tipe_industri.nama as status_industri', 'industri_kreatif.nama as status_kreatif', 'kbli.nama as nama_kbli', 'skala_industri.nama as nama_skala', 'pendidikan_tenaga.nama as nama_pendidikan', 'nilai_investasi.nama as status_investasi', 'akses_bahan.nama as status_akses', 'jumlah_bahan_baku_terbuang.nama as jumlah_terbuang', 'jumlah_produk_cacat.nama as jumlah_cacat', 'mesin_peralatan_industri.nama as status_mesin', 'pengelolaan_keuangan.nama as status_pengelolaan', 'jenis_pencatatan_keuangan.nama as status_pencatatan', 'id_akses_modal.nama as status_modal', 'pertumbuhan_penjualan.nama as jumlah_pertumbuhan', 'cara_penjualan.nama as cara_jual', 'area_pemasaran.nama as area', 'pemasaran_online.nama as online', 'frekuensi_keterlambatan.nama as jumlah_terlambat', 'frekuensi_komplain.nama as jumlah_komplain', 'energi.nama as nama_energi', 'tenaga_desainer.nama as desainer', 'komitmen.nama as status_komitmen', 'standar_mutu_produk.nama as status_standar')
            ->first();

            $data['data_edit_pemilik'] = DB::table('data_pemilik')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_pemilik.kelurahan_id')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_pemilik.kecamatan_id')
            ->where('data_pemilik.id_pemilik', '=', $data['data_edit']->id_pemilik_perusahaan)
            ->select('kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan')
            ->first();

        $data['data_edit_sertifikat'] = DB::table('perusahaan_sertifikat')->where("perusahaan_id", "=", $id_perusahaan)->leftJoin("administrasi_legalitas_standardisasi", 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')->get();

        $data['data_edit_pameran'] = DB::table('perusahaan_pameran')->where("perusahaan_id", "=", $id_perusahaan)->leftJoin("pameran", 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')->get();

        $data['data_edit_keterampilan'] = DB::table('perusahaan_keterampilan')->where("perusahaan_id", "=", $id_perusahaan)->leftJoin("tingkat_keterampilan_tenaga", 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')->get();

        $data['data_edit_bpjs'] = DB::table('perusahaan_bpjs')->where("perusahaan_id", "=", $id_perusahaan)->leftJoin("keikutsertaan_bpjs", 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')->get();

        $data['data_edit_pelatihan'] = DB::table('perusahaan_pelatihan')->where("perusahaan_id", "=", $id_perusahaan)->get();
        $data['data_edit_bantuan_alat'] = DB::table('perusahaan_bantuan_alat')->where("perusahaan_id", "=", $id_perusahaan)->get();
        $data['data_edit_bantuan_bahan'] = DB::table('perusahaan_bantuan_bahan')->where("perusahaan_id", "=", $id_perusahaan)->get();


        return view('editAdmin', $data);
    }

    //fungsi saveEdit untuk menyimpan hasil edit data oleh admin. code yang berada di dalam fungsi ini sama dengan code yang berada dalam fungsi save, bedanya hanya ini akan me-update (seperti line 576)
    public function saveEdit(Request $request, $id_perusahaan)
    {
        try {
            DB::beginTransaction();
            $data_lama_perusahaan = DB::table('data_perusahaan')->where("id_perusahaan", "=", $request->input('id_perusahaan'))->first();
            $data_perusahaan = DataPerusahaan::where('id_perusahaan', '=', $request->input('id_perusahaan'))->first();
            $data_pemilik = DataPemilik::where('id_pemilik', '=', $data_perusahaan->id_pemilik)->get();
            $update = DB::table('data_pemilik')->where("id_pemilik", "=",  $data_perusahaan->id_pemilik)->update([
                'nik' => $request->input('nik'),
                'nama' => $request->input('nama'),
                'alamat' => $request->input('alamat'),
                'rt' => $request->input('rt'),
                'rw' => $request->input('rw'),
                'kodepos' => $request->input('kodepos'),
                'kecamatan_id' => $request->input('kecamatan'),
                'kelurahan_id' => $request->input('kelurahan'),
                'telepon' => $request->input('telepon'),
                'email' => $request->input('email'),
                'npwp' => $request->input('npwp')
            ]);
            if ($update) {
                $data_pemilik = $data_pemilik[0]->id_pemilik;
            }
            $namafile=null;
            $foto_perusahaan = $request->file('foto_perusahaan');
            if($foto_perusahaan!=null){
                $namafile = time().rand(100,999).".".$foto_perusahaan->getClientOriginalExtension();
                $foto_perusahaan->move(public_path().'/logo',$namafile);
            }
            $data_perusahaan = DB::table('data_perusahaan')->where("id_perusahaan", "=", $request->input('id_perusahaan'))->update([
                'foto_perusahaan' => $namafile==null ? $data_perusahaan->foto_perusahaan : $namafile,
                'badan_usaha' => $request->input('badan_usaha'),
                'nama_perusahaan' => $request->input('nama_perusahaan'),
                'alamat_perusahaan' => $request->input('alamat_perusahaan'),
                'kecamatan_perusahaan' => $request->input('kecamatan_perusahaan'),
                'kelurahan_perusahaan' => $request->input('kelurahan_perusahaan'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'npwp_perusahaan' => $request->input('npwp_perusahaan'),
                'email_perusahaan' => $request->input('email_perusahaan'),
                'website' => $request->input('website'),
                'telepon_perusahaan' => $request->input('telepon_perusahaan'),
                'fax' => $request->input('fax'),
                'tipe_industri_id' => $request->input('tipe_industri'),
                'industri_kreatif_id' => $request->input('industri_kreatif'),
                'komoditas' => $request->input('komoditas'),
                'jenis_produk' => $request->input('jenis_produk'),
                'id_kbli' => $request->input('kbli'),
                'skala_id' => $request->input('skala_industri'),
                'izin_usaha' => $request->input('izin_usaha'),
                'tahun_izin' => $request->input('tahun_izin'),
                'jumlah_tenaga_lk' => $request->input('jumlah_tenaga_lk'),
                'jumlah_tenaga_pr' => $request->input('jumlah_tenaga_pr'),
                'pendidikan_tenaga_id' => $request->input('pendidikan_tenaga'),
                'investasi_id' => $request->input('nilai_investasi'),
                'omset' => $request->input('omset'),
                'bahan_baku' => $request->input('bahan_baku'),
                'nilai_bahan_baku' => $request->input('nilai_bahan_baku'),
                'bahan_penolong' => $request->input('bahan_penolong'),
                'nilai_bahan_penolong' => $request->input('nilai_bahan_penolong'),
                'nilai_mesin_peralatan' => $request->input('nilai_mesin_peralatan'),
                'nilai_modal_kerja' => $request->input('nilai_modal_kerja'),
                'ketersediaan_id' => $request->input('akses_bahan'),
                'bahan_baku_terbuang_id' => $request->input('jumlah_bahan_baku_terbuang'),
                'produk_cacat_id' => $request->input('jumlah_produk_cacat'),
                'mesin_id' => $request->input('mesin_peralatan_industri'),
                'nama_mesin' => $request->input('nama_mesin'),
                'volume_mesin' => $request->input('volume_produksi'),
                'harga_satuan' => $request->input('harga_satuan'),
                'nilai_produksi_total' => $request->input('nilai_produksi_total'),
                'pengelolaan_id' => $request->input('pengelolaan_keuangan'),
                'pencatatan_id' => $request->input('jenis_pencatatan_keuangan'),
                'akses_modal_id' => $request->input('id_akses_modal'),
                'pertumbuhan_id' => $request->input('pertumbuhan_penjualan'),
                'cara_penjualan_id' => $request->input('cara_penjualan'),
                'area_pemasaran_id' => $request->input('area_pemasaran'),
                'pemasaran_id' => $request->input('pemasaran_online'),
                'negara_ekspor' => $request->input('negara_ekspor'),
                'keterlambatan_id' => $request->input('frekuensi_keterlambatan'),
                'komplain_id' => $request->input('frekuensi_komplain'),
                'energi_id' => $request->input('energi'),
                'daya_energi' => $request->input('daya_energi'),
                'limbah' => $request->input('limbah'),
                'jumlah_limbah' => $request->input('jumlah_limbah'),
                'satuan_limbah' => $request->input('satuan_limbah'),
                'olahan_limbah' => $request->input('olahan_limbah'),
                'tenaga_desainer_id' => $request->input('tenaga_desainer'),
                'inovasi_mesin' => $request->input('inovasi_mesin'),
                'inovasi_bahan' => $request->input('inovasi_bahan'),
                'inovasi_produk' => $request->input('inovasi_produk'),
                'komitmen_id' => $request->input('komitmen'),
                'standar_mutu_produk' => $request->input('standar_mutu_produk'),
                'status' => 0,
            ]);

             $perusahaan_ket_db = DB::table('perusahaan_keterampilan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('keterampilan_id')->toArray();
            if(count($request->input('keterampilan'))>0){
                $diff = array_diff($perusahaan_ket_db, array_column($request->input('keterampilan'),'id'));
                foreach($diff as $d){
                    DB::table('perusahaan_keterampilan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)
                    ->where("keterampilan_id","=",$d)->delete();
                }
            }

            foreach ($request->input('keterampilan') as $tkt) {
                if (isset($tkt['id'])) {
                    if(in_array($tkt['id'], $perusahaan_ket_db)){
                       DB::table('perusahaan_keterampilan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("keterampilan_id", "=", $tkt['id'])->update([
                            "jumlah_keterampilan" => $tkt['jumlah_keterampilan']
                        ]);
                    } else {
                        DB::table('perusahaan_keterampilan')->insert([
                            "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                            "keterampilan_id" => $tkt['id'],
                            "jumlah_keterampilan" => $tkt['jumlah_keterampilan']
                        ]);
                    }
                }
            }
            $perusahaan_bpjs_db = DB::table('perusahaan_bpjs')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('bpjs_id')->toArray();
            if(count($request->input('bpjs'))>0){
                $diff = array_diff($perusahaan_bpjs_db, array_column($request->input('bpjs'),'id'));
                foreach($diff as $d){
                    DB::table('perusahaan_bpjs')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)
                    ->where("bpjs_id","=",$d)->delete();
                }
            }
            foreach ($request->input('bpjs') as $bpjs) {
                if (isset($bpjs['id'])) {
                    if(in_array($bpjs['id'], $perusahaan_bpjs_db)){
                        DB::table('perusahaan_bpjs')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("bpjs_id", "=", $bpjs['id'])->update([
                            "jumlah_bpjs" => $bpjs['jumlah']
                        ]);
                    }else {
                        DB::table('perusahaan_bpjs')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "bpjs_id" => $bpjs['id'],
                        "jumlah_bpjs" => $bpjs['jumlah']
                        ]);
                    }
                }
            }

            $perusahaan_sertifikat_db = DB::table('perusahaan_sertifikat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('sertifikat_id')->toArray();
            if(count($request->input('administrasi'))>0){
                $diff = array_diff($perusahaan_sertifikat_db, array_column($request->input('administrasi'),'id'));
                foreach($diff as $d){
                    DB::table('perusahaan_sertifikat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)
                    ->where("sertifikat_id","=",$d)->delete();
                }
            }
            foreach ($request->input('administrasi') as $idx => $adm) {
                if (isset($adm['id'])) {
                    $namadokumenADM = null;
                    $dokumen_sertifikat = isset($request->file('administrasi')[$idx])? $request->file('administrasi')[$idx]['dokumen'] : null;
                    if($dokumen_sertifikat!=null){
                        $namadokumenADM = time().rand(100,999).".".$dokumen_sertifikat->getClientOriginalExtension();
                        $dokumen_sertifikat->move(public_path().'/dokumen_sertifikat',$namadokumenADM);
                    }
                    if(in_array($adm['id'], $perusahaan_sertifikat_db)){
                        DB::table('perusahaan_sertifikat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("sertifikat_id", "=", $adm['id'])->update([
                            "nomor_sertifikat" => $adm['nomor'],
                            "dokumen_sertifikat" => $namadokumenADM
                        ]);
                    }else {
                        DB::table('perusahaan_sertifikat')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "sertifikat_id" => $adm['id'],
                        "nomor_sertifikat" => $adm['nomor'],
                        "dokumen_sertifikat" => $namadokumenADM
                        ]);
                    }
                }
            }

            $perusahaan_pameran_db = DB::table('perusahaan_pameran')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('pameran_id')->toArray();
            if(count($request->input('pameran'))>0){
                $diff = array_diff($perusahaan_pameran_db, array_column($request->input('pameran'),'id'));
                foreach($diff as $d){
                    DB::table('perusahaan_pameran')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)
                    ->where("pameran_id","=",$d)->delete();
                }
            }
            foreach ($request->input('pameran') as $pam) {
                if (isset($pam['id'])) {
                    $namadokumenPAM = null;
                    $dokumen_pameran = $request->file('dokumen_pameran');
                    if($dokumen_pameran!=null){
                        $namadokumenPAM = time().rand(100,999).".".$dokumen_pameran->getClientOriginalExtension();
                        $dokumen_pameran->move(public_path().'/dokumen_pameran',$namadokumenPAM);
                        $dokumen_pameran[] = $namadokumenPAM;
                    }
                    if(in_array($pam['id'], $perusahaan_pameran_db)){
                        DB::table('perusahaan_pameran')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("pameran_id", "=", $pam['id'])->update([
                            "nama_pameran" => $pam['name'],
                            "dokumen_pameran" => $namadokumenPAM
                        ]);
                    }else {
                        DB::table('perusahaan_pameran')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "pameran_id" => $pam['id'],
                        "nama_pameran" => $pam['name'],
                        "dokumen_pameran" => $namadokumenPAM
                        ]);
                    }
                }
            }
            $data_pel = $request->input('nama_pelatihan');
            $data_doc = $request->file('dokumen_pelatihan');
            $perusahaan_pelatihan_db = DB::table('perusahaan_pelatihan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('nama_pelatihan')->toArray();
            if(count($data_pel)>0){
                $diff = array_diff($perusahaan_pelatihan_db, $data_pel);
                foreach($diff as $d){
                    DB::table('perusahaan_pelatihan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("nama_pelatihan","=",$d)
                    ->delete();
                }
            }
            if ($data_pel != null) {
                for ($i = 0; $i < count($data_pel); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_pelatihan',$dokumen);
                    }
                    if(in_array($data_pel[$i], $perusahaan_pelatihan_db)){
                        DB::table('perusahaan_pelatihan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("nama_pelatihan", "=", $data_pel[$i])->update([
                            "nama_pelatihan" => $data_pel[$i],
                            "dokumen_pelatihan" => $dokumen
                        ]);
                    }else{
                         DB::table('perusahaan_pelatihan')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "nama_pelatihan" => $data_pel[$i],
                        "dokumen_pelatihan" => $dokumen
                        ]);
                    }
                }
            }

            $data_baa = $request->input('tahun_alat');
            $data_bentuk = $request->input('bentuk_alat');
            $data_doc = $request->file('dokumen_alat');
            $perusahaan_bantuan_alat_db = DB::table('perusahaan_bantuan_alat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('tahun_alat')->toArray();
            if(count($data_baa)>0){
                $diff = array_diff($perusahaan_bantuan_alat_db, $data_baa);
                foreach($diff as $d){
                    DB::table('perusahaan_bantuan_alat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("tahun_alat", "=", $d)
                    ->delete();
                }
            }
            if ($data_baa != null) {
                for ($i = 0; $i < count($data_baa); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_bantuan_alat',$dokumen);
                    }
                    if(in_array($data_baa[$i], $perusahaan_bantuan_alat_db)){
                        DB::table('perusahaan_bantuan_alat')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("tahun_alat", "=", $data_baa[$i])->update([
                            "bentuk_alat" => $data_bentuk[$i],
                            "dokumen_alat" => $dokumen
                        ]);
                    }else{
                        DB::table('perusahaan_bantuan_alat')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "tahun_alat" => $data_baa[$i],
                        "bentuk_alat" => $data_bentuk[$i],
                        "dokumen_alat" => $dokumen
                        ]);
                    }
                }
            }

            $data_bah = $request->input('tahun_bahan');
            $data_bentuk = $request->input('bentuk_bahan');
            $data_doc = $request->file('dokumen_bahan');
            $perusahaan_bantuan_bahan_db = DB::table('perusahaan_bantuan_bahan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->pluck('tahun_bahan')->toArray();
            if(count($data_bah)>0){
                $diff = array_diff($perusahaan_bantuan_bahan_db, $data_bah);
                foreach($diff as $d){
                    DB::table('perusahaan_bantuan_bahan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("tahun_bahan", "=", $d)
                    ->delete();
                }
            }
            if ($data_bah != null) {
                for ($i = 0; $i < count($data_bah); $i++) {
                    $dokumen = null;
                    if($data_doc!=null && $data_doc[$i]!=null){
                        $dokumen = time().rand(100,999).".".$data_doc[$i]->getClientOriginalExtension();
                        $data_doc[$i]->move(public_path().'/dokumen_bantuan_bahan',$dokumen);
                    }
                    if(in_array($data_bah[$i], $perusahaan_bantuan_bahan_db)){
                        DB::table('perusahaan_bantuan_bahan')->where("perusahaan_id", "=", $data_lama_perusahaan->id_perusahaan)->where("tahun_bahan", "=", $data_bah[$i])->update([
                            "bentuk_bahan" => $data_bentuk[$i],
                            "dokumen_bahan" => $dokumen
                        ]);
                    } else {
                        DB::table('perusahaan_bantuan_bahan')->insert([
                        "perusahaan_id" => $data_lama_perusahaan->id_perusahaan,
                        "tahun_bahan" => $data_bah[$i],
                        "bentuk_bahan" => $data_bentuk[$i],
                        "dokumen_bahan" => $dokumen
                        ]);
                    }
                }
            }
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }

        return redirect('admin/home');
    }

    //fungsi untuk menghapus data dari perusahaan yang dipilih
    public function destroy($id_perusahaan)
    {
        $data_perusahaan = DataPerusahaan::where('id_perusahaan', '=', $id_perusahaan);
        $data_pemilik = DataPemilik::where('id_pemilik', '=', $data_perusahaan->first()->id_pemilik);
        $data_perusahaan_sertifikat = DB::table('perusahaan_sertifikat')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_bpjs = DB::table('perusahaan_bpjs')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_keterampilan = DB::table('perusahaan_keterampilan')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_pameran = DB::table('perusahaan_pameran')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_pelatihan = DB::table('perusahaan_pelatihan')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_bantuan_alat = DB::table('perusahaan_bantuan_alat')->where('perusahaan_id', '=', $id_perusahaan);
        $data_perusahaan_bantuan_bahan = DB::table('perusahaan_bantuan_bahan')->where('perusahaan_id', '=', $id_perusahaan);

        $data_perusahaan_pelatihan->delete();
        $data_perusahaan_pameran->delete();
        $data_perusahaan_bantuan_alat->delete();
        $data_perusahaan_bantuan_bahan->delete();
        $data_perusahaan_keterampilan->delete();
        $data_perusahaan_bpjs->delete();
        $data_perusahaan_sertifikat->delete();

        $data_perusahaan->delete();

        return redirect('dataPerusahaan')->with('completed', 'Data has been deleted');
    }

    //fungsi verifikasi untuk menampilkan data yang telah diverifikasi (status=1)
    public function verifikasi($id_perusahaan=null)
    {
        if($id_perusahaan!=null){
            $data = DB::table('data_perusahaan')
                ->where("id_perusahaan", "=", $id_perusahaan)
                ->update(["status" => 1]);
        }
        
        $data = DB::table('data_pemilik')
            ->join('data_perusahaan', 'data_perusahaan.id_pemilik', '=', 'data_pemilik.id_pemilik')
            ->join('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
            ->select('data_pemilik.*', 'data_perusahaan.*', 'tipe_industri.nama as status_industri')
            ->where('data_perusahaan.status', "=", '1')
            ->get();
        return view('verifikasiAdmin', compact('data'));
    }

    //menampilkan data statistik
     public function statistik()
    {   
        $data = [];
        $data['tipe_industri'] = TipeIndustri::all();
        $data['count'] = DataPerusahaan::all() //menghitung jumlah tipe industri agro dan aneka pangan
            ->where('tipe_industri_id', 1)
            ->where('status', 1)
            ->count();
        $data['hitung'] = DataPerusahaan::all() //menghitung jumlah tipe industri tekstil dan produk tekstil
            ->where('tipe_industri_id', 2)
            ->where('status', 1)
            ->count();
        $data['jumlah'] = DataPerusahaan::all() //menghitung jumlah tipe industri aneka usaha industri
            ->where('tipe_industri_id', 3)
            ->where('status', 1)
            ->count();
        $data['data'] = DB::table('data_perusahaan')
            ->leftJoin('data_pemilik', 'data_pemilik.id_pemilik', '=', 'data_perusahaan.id_pemilik')
            ->join('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
            ->select('data_pemilik.*', 'data_perusahaan.*', 'tipe_industri.id_tipe_industri as id_tipe','tipe_industri.nama as status_industri', 'data_pemilik.nama as nama_pemilik')
            ->where('data_perusahaan.status', "=", '1')
            ->paginate(10);
        return view('statistikAdmin', $data);
    }

    //menampilkan hasil pencarian dan filter data berdasarkan nama industri dan tipe industri
    public function search(Request $request)
    {
        $cari = $request->cari;
        $filter = $request->filter;
        $dari = $request->dari;
        $sampai = $request->sampai;
        $data = [];
        $data['tipe_industri'] = TipeIndustri::all();
        $data['count'] = DataPerusahaan::all()
            ->where('tipe_industri_id', 1)
            ->where('status', 1)
            ->count();
        $data['hitung'] = DataPerusahaan::all()
            ->where('tipe_industri_id', 2)
            ->where('status', 1)
            ->count();
        $data['jumlah'] = DataPerusahaan::all()
            ->where('tipe_industri_id', 3)
            ->where('status', 1)
            ->count();
        $data['data'] = DB::table('data_perusahaan')
        ->leftJoin('data_pemilik', 'data_pemilik.id_pemilik', '=', 'data_perusahaan.id_pemilik')
        ->leftJoin('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
        ->select('data_pemilik.*', 'data_perusahaan.*', 'tipe_industri.*', 'tipe_industri.nama as status_industri', 'data_pemilik.nama as nama_pemilik')
        ->where('data_perusahaan.status', "=", '1')
        ->where('nama_perusahaan', 'like', "%".$cari."%")
        ->where('tipe_industri_id', 'like', "%".$filter."%")
        ->where('updated_at','>=', $dari)
        ->where('updated_at','<=', $sampai)
        ->paginate(10);
        return view('statistikAdmin', $data);
    }

    // melakukan cetak data 
    public function cetakData($id_perusahaan)
    {
        $data = DB::table('data_perusahaan')
            ->leftJoin('data_pemilik', 'data_pemilik.id_pemilik', '=', 'data_perusahaan.id_pemilik')
            ->leftJoin('perusahaan_keterampilan', 'perusahaan_keterampilan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('tingkat_keterampilan_tenaga', 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')
            ->leftJoin('perusahaan_bpjs', 'perusahaan_bpjs.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('keikutsertaan_bpjs', 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')
            ->leftJoin('perusahaan_sertifikat', 'perusahaan_sertifikat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('administrasi_legalitas_standardisasi', 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')
            ->leftJoin('perusahaan_pameran', 'perusahaan_pameran.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('pameran', 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')
            ->leftJoin('perusahaan_pelatihan', 'perusahaan_pelatihan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_alat', 'perusahaan_bantuan_alat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('perusahaan_bantuan_bahan', 'perusahaan_bantuan_bahan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')

            ->leftJoin('badan_usaha', 'badan_usaha.id_badan_usaha', '=', 'data_perusahaan.badan_usaha')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_perusahaan.kecamatan_perusahaan')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_perusahaan.kelurahan_perusahaan')
            ->leftJoin('tipe_industri', 'tipe_industri.id_tipe_industri', '=', 'data_perusahaan.tipe_industri_id')
            ->leftJoin('industri_kreatif', 'industri_kreatif.id_industri_kreatif', '=', 'data_perusahaan.industri_kreatif_id')
            ->leftJoin('kbli', 'kbli.id_kbli', '=', 'data_perusahaan.id_kbli')
            ->leftJoin('skala_industri', 'skala_industri.id_skala', '=', 'data_perusahaan.skala_id')
            ->leftJoin('pendidikan_tenaga', 'pendidikan_tenaga.id_pendidikan', '=', 'data_perusahaan.pendidikan_tenaga_id')
            ->leftJoin('nilai_investasi', 'nilai_investasi.id_investasi', '=', 'data_perusahaan.investasi_id')
            ->leftJoin('akses_bahan', 'akses_bahan.id_ketersediaan', '=', 'data_perusahaan.ketersediaan_id')
            ->leftJoin('jumlah_bahan_baku_terbuang', 'jumlah_bahan_baku_terbuang.id_bahan_terbuang', '=', 'data_perusahaan.bahan_baku_terbuang_id')
            ->leftJoin('jumlah_produk_cacat', 'jumlah_produk_cacat.id_produk_cacat', '=', 'data_perusahaan.produk_cacat_id')
            ->leftJoin('mesin_peralatan_industri', 'mesin_peralatan_industri.id_mesin', '=', 'data_perusahaan.mesin_id')
            ->leftJoin('pengelolaan_keuangan', 'pengelolaan_keuangan.id_pengelolaan', '=', 'data_perusahaan.pengelolaan_id')
            ->leftJoin('jenis_pencatatan_keuangan', 'jenis_pencatatan_keuangan.id_pencatatan', '=', 'data_perusahaan.pencatatan_id')
            ->leftJoin('id_akses_modal', 'id_akses_modal.id_akses_modal', '=', 'data_perusahaan.akses_modal_id')
            ->leftJoin('pertumbuhan_penjualan', 'pertumbuhan_penjualan.id_pertumbuhan_penjualan', '=', 'data_perusahaan.pertumbuhan_id')
            ->leftJoin('cara_penjualan', 'cara_penjualan.id_cara_jual', '=', 'data_perusahaan.cara_penjualan_id')
            ->leftJoin('area_pemasaran', 'area_pemasaran.id_area_pemasaran', '=', 'data_perusahaan.area_pemasaran_id')
            ->leftJoin('pemasaran_online', 'pemasaran_online.id_pemasaran', '=', 'data_perusahaan.pemasaran_id')
            ->leftJoin('frekuensi_keterlambatan', 'frekuensi_keterlambatan.id_keterlambatan', '=', 'data_perusahaan.keterlambatan_id')
            ->leftJoin('frekuensi_komplain', 'frekuensi_komplain.id_komplain', '=', 'data_perusahaan.komplain_id')
            ->leftJoin('energi', 'energi.id_energi', '=', 'data_perusahaan.energi_id')
            ->leftJoin('tenaga_desainer', 'tenaga_desainer.id_tenaga', '=', 'data_perusahaan.tenaga_desainer_id')
            ->leftJoin('standar_mutu_produk', 'standar_mutu_produk.id_standar_mutu', '=', 'data_perusahaan.standar_mutu_produk')
            ->leftJoin('komitmen', 'komitmen.id_komitmen', '=', 'data_perusahaan.komitmen_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select(
                'data_pemilik.*',
                'data_perusahaan.*',
                'perusahaan_keterampilan.*',
                'perusahaan_bpjs.*',
                'perusahaan_sertifikat.*',
                'perusahaan_pameran.*',
                'perusahaan_bantuan_alat.*',
                'perusahaan_bantuan_bahan.*',
                'perusahaan_pelatihan.*',
                'keikutsertaan_bpjs.nama as status_bpjs',
                'pameran.nama as status_pameran',
                'tingkat_keterampilan_tenaga.nama as status_keterampilan',
                'data_pemilik.id_pemilik as id_pemilik_perusahaan',
                'administrasi_legalitas_standardisasi.nama as status_sertifikat',
                'badan_usaha.nama as status_usaha', 'kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan', 'tipe_industri.nama as status_industri', 'industri_kreatif.nama as status_kreatif', 'kbli.nama as nama_kbli', 'skala_industri.nama as nama_skala', 'pendidikan_tenaga.nama as nama_pendidikan', 'nilai_investasi.nama as status_investasi', 'akses_bahan.nama as status_akses', 'jumlah_bahan_baku_terbuang.nama as jumlah_terbuang', 'jumlah_produk_cacat.nama as jumlah_cacat', 'mesin_peralatan_industri.nama as status_mesin', 'pengelolaan_keuangan.nama as status_pengelolaan', 'jenis_pencatatan_keuangan.nama as status_pencatatan', 'id_akses_modal.nama as status_modal', 'pertumbuhan_penjualan.nama as jumlah_pertumbuhan', 'cara_penjualan.nama as cara_jual', 'area_pemasaran.nama as area', 'pemasaran_online.nama as online', 'frekuensi_keterlambatan.nama as jumlah_terlambat', 'frekuensi_komplain.nama as jumlah_komplain', 'energi.nama as nama_energi', 'tenaga_desainer.nama as desainer', 'komitmen.nama as status_komitmen', 'standar_mutu_produk.nama as status_standar')
            ->first();

            $data_keterampilan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_keterampilan', 'perusahaan_keterampilan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('tingkat_keterampilan_tenaga', 'tingkat_keterampilan_tenaga.id_keterampilan', '=', 'perusahaan_keterampilan.keterampilan_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('tingkat_keterampilan_tenaga.nama', 'perusahaan_keterampilan.jumlah_keterampilan')
            ->get();

            $data_bpjs =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bpjs', 'perusahaan_bpjs.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('keikutsertaan_bpjs', 'keikutsertaan_bpjs.id_bpjs', '=', 'perusahaan_bpjs.bpjs_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('keikutsertaan_bpjs.nama', 'perusahaan_bpjs.jumlah_bpjs')
            ->get();

            $data_sertifikat =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_sertifikat', 'perusahaan_sertifikat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('administrasi_legalitas_standardisasi', 'administrasi_legalitas_standardisasi.id_administrasi', '=', 'perusahaan_sertifikat.sertifikat_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('administrasi_legalitas_standardisasi.nama', 'perusahaan_sertifikat.nomor_sertifikat', 'perusahaan_sertifikat.dokumen_sertifikat')
            ->get();

            $data_pameran =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_pameran', 'perusahaan_pameran.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->leftJoin('pameran', 'pameran.id_pameran', '=', 'perusahaan_pameran.pameran_id')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('pameran.nama', 'perusahaan_pameran.nama_pameran', 'perusahaan_pameran.dokumen_pameran')
            ->get();

            $data_pelatihan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_pelatihan', 'perusahaan_pelatihan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_pelatihan.nama_pelatihan', 'perusahaan_pelatihan.dokumen_pelatihan')
            ->get();

            $data_bantuan_alat =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bantuan_alat', 'perusahaan_bantuan_alat.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_bantuan_alat.tahun_alat', 'perusahaan_bantuan_alat.bentuk_alat', 'perusahaan_bantuan_alat.dokumen_alat')
            ->get();

            $data_bantuan_bahan =  DB::table('data_perusahaan')
            ->leftJoin('perusahaan_bantuan_bahan', 'perusahaan_bantuan_bahan.perusahaan_id', '=', 'data_perusahaan.id_perusahaan')
            ->where('data_perusahaan.id_perusahaan', '=', $id_perusahaan)
            ->select('perusahaan_bantuan_bahan.tahun_bahan', 'perusahaan_bantuan_bahan.bentuk_bahan', 'perusahaan_bantuan_bahan.dokumen_bahan')
            ->get();

            $data_pemilik = DB::table('data_pemilik')
            ->leftJoin('kelurahan', 'kelurahan.id_kelurahan', '=', 'data_pemilik.kelurahan_id')
            ->leftJoin('kecamatan', 'kecamatan.id_kecamatan', '=', 'data_pemilik.kecamatan_id')
            ->where('data_pemilik.id_pemilik', '=', $data->id_pemilik_perusahaan)
            ->select('kecamatan.nama as nama_kecamatan', 'kelurahan.nama as nama_kelurahan')
            ->first();

        return view('cetakAdmin', compact('data', 'data_pemilik', 'data_keterampilan', 'data_bpjs', 'data_sertifikat', 'data_pameran', 'data_pelatihan', 'data_bantuan_alat', 'data_bantuan_bahan'));
    }


}
