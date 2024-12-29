@extends('webmaster')

@php
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
@endphp

@section('title', 'Beranda')

@section('konten')

<div id="search-results" class="section-container bg-silver">
    <div class="container">
        <div class="search-container">
            <div class="search-content">
                <div class="search-toolbar">
                    <div class="row">
                        <form action="{{url('pencarian')}}" method="GET">
                            <div class="col-md-12">
                                <h4>PENCARIAN</h4>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="cari" placeholder="Cari Nama Barang" value="{{ old('pencarian') }}" />
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="search-item-container">
                    @foreach($produk->chunk(3) as $item)
                    <div class="item-row">
                        @foreach($item as $pdk)
                        <div class="item item-thumbnail">
                            <!-- DISPLAY GAMBAR JSON DECODE -->
                            <img src="{{ url('produk/'.Arr::first(json_decode($pdk->gambar))) }}" class="img img-thumbnail">
                            <div class="item-info">
                                <h4 class="item-title">
                                    <a href="{{ url('produk', [$pdk->id, Str::slug($pdk->nama_produk)]) }}">{{ $pdk->nama_produk }}</a>
                                </h4>
                                <p class="item-desc">{{ $pdk->deskripsi }}</p>
                                <div class="item-price">Rp. {{ number_format($pdk->harga, 0,",",".") }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <ul class="pagination m-t-0">
                        {{ $produk->links() }}
                    </ul>
                </div>
            </div>
            <div class="search-sidebar">
                <h4 class="title m-b-0 text-center">KATEGORI PRODUK</h4>
                <ul class="search-category-list">
                    @foreach($kategori as $ktg)
                    <li><a href="{{ url('kategori', ['id'=> Crypt::encrypt($ktg->id), Str::slug($ktg->kategori)]) }}">{{ $ktg->kategori }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection