<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class FrontController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->orderBy('tanggal', 'desc')
            ->paginate(12);

        $kategori = DB::table('kategori')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('web.beranda', compact('produk', 'kategori'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari tabel sesuai pencarian data
        $produk = DB::table('produk')
            ->where('nama_produk', 'like', "%" . $cari . "%")
            ->paginate(12);
        $kategori = DB::table('kategori')
            ->orderBy('kategori', 'asc')
            ->get();
        // mengirim data ke view index
        return view('web.beranda', compact('produk', 'cari', 'kategori'));
    }

    public function single_produk($id)
    {
        $produk = DB::table('produk')->find($id);

        return view('web.produk_detail', compact('produk'));
    }

    public function kategori($id)
    {
        $id = Crypt::decrypt($id);
        $ktgr = DB::table('kategori')->find($id);
        $pilih = $ktgr->kategori;
        $produk = DB::table('produk')
            ->where('kategori', '=', $pilih)
            ->orderBy('tanggal', 'desc')
            ->paginate(12);

        $kategori = DB::table('kategori')
            ->orderBy('kategori', 'asc')
            ->get();

        return view('web.beranda', compact('produk', 'kategori'));
    }
}
