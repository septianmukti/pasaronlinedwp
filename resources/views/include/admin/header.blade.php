		@php
		use Illuminate\Support\Facades\Auth;
		@endphp
		<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="{{ url('admin/beranda') }}">
					<img src="{{ asset('assets/front/img/logo_admin.png') }}" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">{{ Auth::user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="javascript:void()" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
						<form id="logout-form" method="POST" action="{{ route('logout') }}">
                        	@csrf
                    	</form>
					</div>
				</div>
			</div>
		</div>
	</div>