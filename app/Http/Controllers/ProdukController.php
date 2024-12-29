<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.list_produk', ['produk' => $produk]);
    }

    public function hapus($id)
    {
        $barang = DB::table('produk')->find($id);
        if (!empty($barang->gambar)) {
            foreach (json_decode($barang->gambar, true) as $img) {
                $image_path = 'produk/' . $img;
                unlink($image_path);
            }
            DB::table('produk')->delete($id);
        } else {
            return redirect('admin/semua-produk')->with('error', 'Produk Tidak Ditemukan.');
        }

        return redirect('admin/semua-produk')->with('sukses', 'Data Berhasil Dihapus.');
    }
}
