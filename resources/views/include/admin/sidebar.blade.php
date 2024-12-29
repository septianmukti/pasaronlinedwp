	@php
		use Illuminate\Support\Facades\Auth;
	@endphp
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ url('admin/beranda') }}">
				<img src="{{ asset('assets/front/img/madiun-logo.png') }}" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					@if (Auth::user()->role == '1')
					<li>
						<a href="{{ url('admin/beranda') }}" class="dropdown-toggle no-arrow {{ request()->is('admin/beranda') ? 'active' : '' }}">
							<span class="fa fa-home"></span><span class="mtext">Beranda</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-server"></span><span class="mtext">Manajemen Produk</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ url('admin/semua-produk') }}" class="{{ request()->is('admin/semua-produk') ? 'active' : '' }}">Semua Produk</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ url('admin/profil') }}" class="dropdown-toggle no-arrow {{ request()->is('admin/profil') ? 'active' : '' }}">
							<span class="fa fa-user-circle-o"></span><span class="mtext">Profil</span>
						</a>
					</li>
					<li>
						<a href="{{ url('admin/ganti-password') }}" class="dropdown-toggle no-arrow {{ request()->is('admin/ganti-password') ? 'active' : '' }}">
							<span class="fa fa-lock"></span><span class="mtext">Ganti Password</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-users"></span><span class="mtext">Manajemen Akun</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ url('admin/semua-akun-penjual') }}" class="{{ request()->is('admin/semua-akun-penjual') ? 'active' : '' }}">Semua Akun Penjual</a></li>
							<li><a href="{{ url('admin/tambah-akun') }}" class="{{ request()->is('admin/tambah-akun') ? 'active' : '' }}">Tambah Akun</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ url('/') }}" class="dropdown-toggle no-arrow" target="_blank">
							<span class="fa fa-dashboard"></span><span class="mtext">Kembali ke Website</span>
						</a>
					</li>
					@endif
					@if (Auth::user()->role == '0')
					<li>
						<a href="{{ url('user/beranda') }}" class="dropdown-toggle no-arrow {{ request()->is('user/beranda') ? 'active' : '' }}">
							<span class="fa fa-home"></span><span class="mtext">Beranda</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="fa fa-server"></span><span class="mtext">Manajemen Produk</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ url('user/semua-produk') }}" class="{{ request()->is('user/semua-produk') ? 'active' : '' }}">Semua Produk</a></li>
							<li><a href="{{ url('user/tambah-produk') }}" class="{{ request()->is('user/tambah-produk') ? 'active' : '' }}">Tambah Produk Baru</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ url('user/profil') }}" class="dropdown-toggle no-arrow {{ request()->is('user/profil') ? 'active' : '' }}">
							<span class="fa fa-user-circle-o"></span><span class="mtext">Profil</span>
						</a>
					</li>
					<li>
						<a href="{{ url('user/ganti-password') }}" class="dropdown-toggle no-arrow {{ request()->is('user/ganti-password') ? 'active' : '' }}">
							<span class="fa fa-lock"></span><span class="mtext">Ganti Password</span>
						</a>
					</li>
					<li>
						<a href="{{ url('/') }}" class="dropdown-toggle no-arrow" target="_blank">
							<span class="fa fa-dashboard"></span><span class="mtext">Kembali ke Website</span>
						</a>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</div>