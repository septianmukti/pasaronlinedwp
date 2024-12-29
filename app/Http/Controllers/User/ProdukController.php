<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = DB::table('produk')
            ->where('username', '=', Auth::user()->username)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('user.list_produk', ['produk' => $produk]);
    }

    public function tambah_view()
    {
        $produk = DB::table('kategori')
            ->orderBy('id', 'asc')
            ->get();

        return view('user.tambah_produk', ['produk' => $produk]);
    }

    public function tambahproduk(Request $request)
    {
        $pesan = [
            'mimes' => 'File yang boleh diupload hanya bertipe PNG, JPG atau JPEG.',
            'max' => 'Ukuran file :attribute yang diupload Maksimal :max.',
            'numeric' => ':attribute harus diisi dengan angka dan tanpa menggunakan symbol atau Huruf .',
            'required' => ':attribute harus ditambahkan minimal 1 gambar.'
        ];

        $this->validate($request, [
            'gambar.*' => 'mimes:jpg,png,jpeg|max:50000',
            'harga' => 'numeric',
            'kontak' => 'numeric',
            'gambar' => 'required'
        ], $pesan);

        if ($request->hasfile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $name = time() . "-" . preg_replace('/\s+/', '-', $file->getClientOriginalName());
                $file->move('produk/', $name);
                $data[] = $name;
            }
        }

        // insert produk ke database
        DB::table('produk')->insert([
            'nama_produk' => $request->nama,
            'kategori' => $request->kategori,
            'tag' => $request->tag,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
            'username' => Auth::user()->username,
            'gambar' => json_encode($data),
            'tanggal' => date('Y-m-d'),
        ]);

        // alihkan halaman ke halaman produk
        return redirect('user/semua-produk')->with(['sukses' => 'Produk Berhasil Ditambahkan.']);
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
            return redirect('user/semua-produk')->with('error', 'Produk Tidak Ditemukan.');
        }

        return redirect('user/semua-produk')->with('sukses', 'Data Berhasil Dihapus.');
    }
}
