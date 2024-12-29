@php
use Illuminate\Support\Facades\Session;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Login | {{ config('app.name') }}</title>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="robots" content="noindex, nofollow" />
	<meta name="description" content="Login Katalog Produk Kabupaten Madiun">
    <meta name="author" content="Septian">
	@include('include.admin.head')
</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<img src="{{ asset('assets/admin/vendors/images/logo_dharma_wanita_persatuan.png') }}" alt="login" class="login-img">
			<h3 class="text-center mb-30"><b>Pasar Online Dharma Wanita Persatuan (DWP)</b></h3>
			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}
				@if ($message = Session::get('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>{{ $message }}</strong> Silahkan Coba Lagi.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
                @if ($message = Session::get('sukses'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Berhasil!</strong> {{ $message }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
                @endif
				<div class="input-group custom input-group-lg">
					<input id="username" name="username" type="text" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Masukkan Username')" oninput="setCustomValidity('')">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input id="password" name="password" type="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="setCustomValidity('')">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="text-center col-lg-12 col-md-12 col-sm-12 mb-30">
					<a type="button" class="btn btn-outline-secondary" href="{{ url('/') }}">Kembali ke Website</a>
				</div>
			</div>
			<p class="text-center">Hak Cipta &copy <script>document.write(new Date().getFullYear())</script> Dinas Komunikasi dan Informatika</p>
		</div>
	</div>
	@include('include.admin.script')
</body>
</html>