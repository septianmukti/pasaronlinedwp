@extends('master')

@section('judul', 'Tambah Produk')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
	<div class="title">
		<h4>TAMBAH PRODUK</h4>
	</div>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('user/beranda') }}">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
		</ol>
	</nav>
</div>
@endsection

@section('konten')
<div class="pd-20 bg-white border-radius-4 box-shadow height-100-p mb-30">
	<div class="clearfix mb-30">
		<div class="pull-left">
			<h4 class="text-blue">Tambahkan Produk baru</h4>
			<p>Silahkan Menambah Produk Baru yang akan Ditampilkan pada Website</p>
		</div>
	</div>
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form method="post" action="{{url('user/tambah-produk/proses')}}" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>NAMA PRODUK :</label>
					<input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Produk" required oninvalid="this.setCustomValidity('Nama Produk harus diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>KATEGORI :</label>
					<select class="custom-select col-12" name="kategori" required oninvalid="this.setCustomValidity('Silahkan Pilih Kategori.')" oninput="setCustomValidity('')">
						<option value="">Pilih Kategori Produk</option>
						@foreach($produk as $pdk)
						<option value="{{ $pdk->kategori }}">{{ $pdk->kategori }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>TAG :</label>
					<input class="form-control" type="text" name="tag" placeholder="Masukkan Tag 'Contoh: Toko ABC' " required oninvalid="this.setCustomValidity('Tag harus diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>HARGA :</label>
					<input class="form-control" type="text" name="harga" placeholder="Masukkan Harga Produk" required oninvalid="this.setCustomValidity('Harga Produk harus diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>DESKRIPSI :</label>
					<textarea class="form-control" name="deskripsi" placeholder="Deskripsi Produk" required oninvalid="this.setCustomValidity('Deskripsi harus diisi.')" oninput="setCustomValidity('')"></textarea>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label>KONTAK :</label>
					<input class="form-control" type="tel" name="kontak" placeholder="Masukkan Kontak WhatsApp Penjual" required oninvalid="this.setCustomValidity('Kontak WA harus diisi.')" oninput="setCustomValidity('')">
					<small class="form-text text-muted">* Ganti angka 0 pada nomor depan anda dengan 62. Contoh: 6281230xxxxxx</small>
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label>UPLOAD GAMBAR PRODUK</label>
					<input type="file" class="form-control-file form-control height-auto mb-5" name="gambar[]">
					<input type="file" class="form-control-file form-control height-auto mb-5" name="gambar[]">
					<input type="file" class="form-control-file form-control height-auto mb-5" name="gambar[]">
					<input type="file" class="form-control-file form-control height-auto mb-5" name="gambar[]">
					<input type="file" class="form-control-file form-control height-auto mb-5" name="gambar[]">
				</div>
			</div>
		</div>
		<div class="form-group mb-0 text-right">
			<input type="submit" class="btn btn-success" value="Tambahkan Produk">
		</div>
	</form>
</div>
@endsection

@section('js')

@endsection