<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GantiPasswordController extends Controller
{
    public function index(User $user)
    {
        $user = Auth::user();
        return view('admin.ganti_password', compact('user'));
    }

    public function gantipassword(Request $request)
    {
        $pesan = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah digunakan oleh User lain.',
            'min' => ':attribute harus diisi minimal :min karakter.',
            'same' => ':attribute dan :other harus sama.',
            "alpha_dash" => ":attribute hanya boleh berupa kata, nomor, dan tanda penghubung.",
        ];

        $this->validate($request, [
            'username' => 'required|alpha_dash|min:7|unique:users,username,' . Auth::user()->id,
            'password' => 'required|alpha_dash|min:5|same:konfirmasi_password',
        ], $pesan);

        // update password
        User::find(auth()->user()->id)->update([
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect('admin/ganti-password')->with('berhasil', 'Username dan Password Telah Berhasil diganti.');
    }
}
