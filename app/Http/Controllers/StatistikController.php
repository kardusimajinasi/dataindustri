<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\TipeIndustri;
use App\Models\DataPerusahaan;

class StatistikController extends Controller
{
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
            ->paginate(5);
        return view('welcomeStatistik', $data);
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
        ->paginate(5);
        return view('welcomeStatistik', $data);
    }
}
