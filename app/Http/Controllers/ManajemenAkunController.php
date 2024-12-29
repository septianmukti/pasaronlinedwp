<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajemenAkunController extends Controller
{
    public function index()
    {
        $akun = DB::table('users')
            ->where('role', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.list_akun', ['users' => $akun]);
    }

    public function tambahakun_view()
    {
        return view('admin.tambah_akun');
    }

    public function tambahakun(Request $request)
    {
        $pesan = [
            'required' => ':attribute harus diisi.',
            'min' => ':attribute harus diisi minimal :min karakter.',
            'unique' => ':attribute sudah digunakan oleh User lain.',
            'email' => ':attribute tidak valid.',
            'numeric' => ':attribute harus berupa angka.',
            'same' => ':attribute dan :other yang dimasukkan harus sama.',
            "alpha_dash" => ":attribute hanya boleh berupa kata, nomor, dan tanda penghubung.",
        ];

        $this->validate($request, [
            'nama' => 'required',
            'username' => 'required|alpha_dash|min:7|unique:users,username',
            'email' => 'required|email|min:7|unique:users,email',
            'kontak' => 'required|numeric',
            'alamat' => 'required',
            'role' => 'required',
            'password' => 'required|alpha_dash|min:5|same:konfirmasi_password',
        ], $pesan);

        // insert produk ke database
        DB::table('users')->insert([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);

        // alihkan halaman ke halaman produk
        return redirect('admin/semua-akun-penjual')->with(['berhasil' => 'Akun Sukses Ditambahkan.']);
    }

    public function gantipasswordpenjual($id)
    {
        $users =  DB::table('users')->where('id', $id)->get();
        return view('admin.ganti_password_penjual', ['users' => $users]);
    }

    public function proses(Request $request)
    {
        $pesan = [
            'required' => ':attribute harus diisi.',
            'min' => ':attribute harus diisi minimal :min karakter.',
            'same' => ':attribute dan :other harus sama.',
            "alpha_dash" => ":attribute hanya boleh berupa kata, nomor, dan tanda penghubung.",
        ];

        $this->validate($request, [
            'password' => 'required|alpha_dash|min:5|same:konfirmasi_password',
        ], $pesan);

        // update password
        DB::table('users')->where('id', $request->id)->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect('admin/semua-akun-penjual')->with('berhasil', 'Password Penjual Telah Berhasil diganti.');
    }

    public function hapusakun($id)
    {
        $user = DB::table('users')->find($id);
        $uname = $user->username;
        DB::table('produk')->where('username', '=', $uname)->delete();
        DB::table('users')->delete($id);

        return redirect('admin/semua-akun-penjual')->with('sukses', 'Data Berhasil Dihapus.');
    }
}
