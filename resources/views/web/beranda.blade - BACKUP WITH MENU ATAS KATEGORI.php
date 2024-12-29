@extends('webmaster')

@section('title', 'Beranda')

@section('konten')
<div id="about-us-content" class="section-container bg-white">
    <div class="container">
        <div class="about-us-content">
            <h4 class="title text-center m-b-30"><b>KATEGORI PRODUK</b></h4>
            <!-- BEGIN row -->
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/aksesoris.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>AKSESORIS</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/fashion.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>FASHION</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/makanan-dan-minuman.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>MAKANAN DAN MINUMAN</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row -->
            <hr />
            <!-- BEGIN row -->
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/perlengkapan-rumah-tangga.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>PERLENGKAPAN RUMAH TANGGA</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/produk-kesehatan-dan-kecantikan.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>PRODUK KESEHATAN DAN KECANTIKAN</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/tanaman.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>TANAMAN</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row -->
            <hr />
            <!-- BEGIN row -->
            <div class="row">
                <div class="col align-self-center">
                    <div class="service">
                        <div class="info">
                            <a href="#"><img src="{{ URL::asset('assets/admin/serba-serbi.svg') }}" style="width: 150px; height: 150px;">
                                <h4 class="title" style="color: black;"><b>SERBA - SERBI</b></h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END row -->
        </div>
    </div>
</div>

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
                            <img src="{{ URL::asset('produk/'.array_first(json_decode($pdk->gambar))) }}" class="img img-thumbnail">
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
                    <li><a href="{{url('kategori/kain')}}">KAIN </a></li>
                    <li><a href="{{url('kategori/kerajinan')}}">KERAJINAN </a></li>
                    <li><a href="{{url('kategori/makanan-dan-minuman')}}">MAKANAN DAN MINUMAN </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection