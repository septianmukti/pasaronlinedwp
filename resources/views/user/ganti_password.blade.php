@extends('master')

@section('judul', 'Ganti Password')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
	<div class="title">
		<h4>GANTI PASSWORD</h4>
	</div>
	<nav aria-label="breadcrumb" role="navigation">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ url('user/beranda') }}">Beranda</a></li>
			<li class="breadcrumb-item active" aria-current="page">Ganti Password</li>
		</ol>
	</nav>
</div>
@endsection

@section('konten')
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
		<div class="bg-white border-radius-4 box-shadow height-100-p">
			<div class="profile-tab height-100-p">
				<div class="tab height-100-p">
					<ul class="nav nav-tabs customtab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Ganti Password</a>
						</li>
					</ul>
					<div class="tab-content">
						<!-- Setting Tab start -->
						<div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
							<div class="profile-setting">
								@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
								@if ($message = Session::get('berhasil'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>Berhasil!</strong> {{ $message }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif
								<ul class="profile-edit-list row">
									<li class="weight-500 col-md-6">
										<h4 class="text-blue mb-20">Username dan Password</h4>
										<div class="form-group">
											<label>USERNAME :</label>
											<input class="form-control form-control-lg" type="text" value="{{ $user->username }}" readonly>
										</div>
									</li>
									<li class="weight-500 col-md-6">
										<h4 class="text-blue mb-20">Ganti Username dan Password</h4>
										<form method="post" action="{{url('user/ganti-password/perbarui')}}">
											{{ csrf_field() }}
											<div class="form-group">
												<label>USERNAME BARU :</label>
												<input class="form-control form-control-lg" type="text" name="username">
											</div>
											<div class="form-group">
												<label>PASSWORD BARU :</label>
												<input class="form-control form-control-lg" type="text" name="password">
											</div>
											<div class="form-group">
												<label>KONFIRMASI PASSWORD BARU :</label>
												<input class="form-control form-control-lg" type="text" name="konfirmasi_password">
											</div>
											<div class="form-group mb-0">
												<input type="submit" class="btn btn-primary" value="Simpan & Perbarui">
											</div>
										</form>
									</li>
								</ul>
							</div>
						</div>
						<!-- Setting Tab End -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')


@endsection