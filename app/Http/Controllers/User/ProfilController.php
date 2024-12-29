<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProfilController extends Controller
{
    public function profil(User $user)
    {
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function gantiprofil(Request $request, User $user)
    {
        $pesan = [
            'required' => ':attribute harus diisi.',
            'email' => ':attribute tidak valid.',
            'unique' => ':attribute sudah digunakan oleh User lain.',
            'numeric' => ':attribute harus berupa angka.',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'kontak' => 'required|numeric',
            'alamat' => 'required',
        ], $pesan);

        User::find(auth()->user()->id)->update([
            'name' => $request->nama,
            'email' => $request->email,
            'kontak' => $request->kontak,
            'alamat' => $request->alamat
        ]);

        return redirect('user/profil')->with('berhasil', 'Profil telah Berhasil diganti.');
    }
}
