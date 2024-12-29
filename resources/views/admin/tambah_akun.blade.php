@extends('master')

@section('judul', 'Tambah Akun')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
	<div class="title">
		<h4>TAMBAH AKUN</h4>
	</div>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('admin/beranda') }}">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Tambah Akun</li>
		</ol>
	</nav>
</div>
@endsection

@section('konten')
<div class="pd-20 bg-white border-radius-4 box-shadow height-100-p mb-30">
	<div class="clearfix mb-30">
		<div class="pull-left">
			<h4 class="text-blue">Tambahkan Akun Baru</h4>
			<p>Silahkan Mendaftarkan akun baru untuk Penjual.</p>
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
	<form method="post" action="{{url('admin/tambah-akun/proses')}}">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label><b>NAMA LENGKAP :</b></label>
					<input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label><b>EMAIL :</b></label>
					<input class="form-control" type="email" name="email" placeholder="Masukkan Email " required oninvalid="this.setCustomValidity('Email Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label><b>KONTAK HP :</b></label>
					<input class="form-control" type="tel" name="kontak" placeholder="Masukkan Kontak HP" required oninvalid="this.setCustomValidity('Kontak HP Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
					<label><b>ALAMAT :</b></label>
					<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('Alamat Harus Diisi.')" oninput="setCustomValidity('')"></textarea>
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label><b>USERNAME :</b></label>
					<input class="form-control" type="text" name="username" placeholder="Masukkan Username" required oninvalid="this.setCustomValidity('Username Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label><b>PASSWORD :</b></label>
					<input class="form-control" type="text" name="password" placeholder="Masukkan Password" required oninvalid="this.setCustomValidity('Password Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label><b>KONFIRMASI PASSWORD :</b></label>
					<input class="form-control" type="text" name="konfirmasi_password" placeholder="Masukkan Kembali Password" required oninvalid="this.setCustomValidity('Konfirmasi Password Harus Diisi.')" oninput="setCustomValidity('')">
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<div class="form-group">
					<label><b>ROLE USER :</b></label>
					<select class="custom-select col-12" name="role" required oninvalid="this.setCustomValidity('Silahkan Pilih Role User.')" oninput="setCustomValidity('')">
						<option value="">Pilih Role Untuk User</option>
						<option value="0">PENJUAL</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group mb-0 text-right">
			<input type="submit" class="btn btn-success" value="Tambah Akun">
		</div>
	</form>
</div>
@endsection

@section('js')

@endsection