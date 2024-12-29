<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function admin()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->count();

        $produk = DB::table('produk')->count();

        return view('admin.beranda', compact('user', 'produk'));
    }

}
