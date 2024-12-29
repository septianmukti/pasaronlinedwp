<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function user()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->count();

        $produk = DB::table('produk')
            ->where('username', '=', Auth::user()->username)
            ->count();

        return view('user.beranda', compact('user', 'produk'));
    }
}
