@extends('webmaster')

@section('title', 'Produk')

@section('konten')

<div id="product" class="section-container p-t-20">
    <div class="container">
        <ul class="breadcrumb m-b-10 f-s-12">
            <li><a href="{{ url('/') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> SEMUA PRODUK</a></li>
        </ul>

        <div class="product">
            <div class="product-detail">
                <div class="product-image">
                    <div class="product-thumbnail">
                        <ul class="product-thumbnail-list">
                            <?php foreach (json_decode($produk->gambar) as $gbr) { ?>
                                <li class="tanda"><a href="#" data-click="show-main-image" data-url="{{ asset('produk/'.$gbr) }}"><img src="{{ asset('produk/'.$gbr) }}" alt="" /></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="product-main-image" data-id="main-image">
                        <img src="{{ url('produk/'.array_first(json_decode($produk->gambar))) }}">
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-info-header">
                        <h1 class="product-title"> {{ $produk->nama_produk }} </h1>
                    </div>
                    <div class="product-warranty">
                        <div class="pull-right">Tag: <b style="color:#00acac">{{ $produk->tag }}</b></div>
                        <div><b>Kategori : </b><b style="color:#00acac">{{ $produk->kategori }}</b></div>
                    </div>
                    <p style="font-size: large;">
                        {{ $produk->deskripsi }}
                    </p>
                    <div class="product-purchase-container">
                        <div class="product-price">
                            <div class="price">Rp. {{ number_format($produk->harga, 0,",",".") }}</div>
                        </div>
                        <a type="button" target="_blank" class="btn btn-success btn-lg" href="https://wa.me/{{ $produk->kontak }}?text=Saya tertarik untuk membeli produk ini segera."><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
            <div class="product-tab">
                <ul id="product-tab" class="nav nav-tabs">
                    <li class="active"><a href="#product-desc" data-toggle="tab">Deskripsi Produk</a></li>
                </ul>
                <div id="product-tab-content" class="tab-content">
                    <div class="tab-pane fade active in" id="product-desc">
                        <div class="product-desc">
                            <p>
                                {{ $produk->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(".tanda").click(
        function(event) {
            $('.tanda').removeClass('active');
            $(this).addClass('active');
            event.preventDefault()
        }
    );
</script>

@endsection