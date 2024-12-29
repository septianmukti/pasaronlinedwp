@extends('master')

@section('judul', 'Beranda')

@section('breadcrumb')
<div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>BERANDA</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
                                </ol>
                            </nav>
                        </div>
@endsection

@section('konten')
<div class="alert alert-success" role="alert">
					<h4 class="alert-heading mb-5">Selamat Datang!</h4>
					<p>Selamat datang di halaman admin Pasar Online Dharma Wanita Persatuan (DWP) Kabupaten Madiun. Halaman ini berfungsi untuk memantau semua barang yang ditampilkan pada halaman website.</p>
					<hr>
					<p class="mb-0">Pastikan anda untuk Log Out setelah selesai menggunakan Halaman Admin ini.</p>
				</div>


				<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
					<div class="row clearfix progress-box">
						<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
							<div class="bg-white pd-20 box-shadow border-radius-5">
								<div class="project-info clearfix">
									<div class="project-info-left">
										<div class="icon box-shadow bg-blue text-white">
											<i class="fa fa-cubes"></i>
										</div>
									</div>
									<div class="project-info-right">
										<span class="no text-blue weight-500 font-24">{{ $produk }} Produk</span>
										<p class="weight-400 font-18">TOTAL PRODUK ANDA</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
							<div class="bg-white pd-20 box-shadow border-radius-5">
								<div class="project-info clearfix">
									<div class="project-info-left">
										<div class="icon box-shadow bg-light-green text-white">
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="project-info-right">
										<span class="no text-light-green weight-500 font-24">{{ $user }} Penjual</span>
										<p class="weight-400 font-18">JUMLAH PENJUAL</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>




@endsection

@section('js')

@endsection
