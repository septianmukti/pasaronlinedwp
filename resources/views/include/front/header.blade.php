        @php
            use Illuminate\Support\Facades\Auth;
        @endphp
        <!-- BEGIN #top-nav -->
        <div id="top-nav" class="top-nav">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Tentang Aplikasi</a></li>
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="keterangan" data-placement="bottom" title="Telepon"><i class="fa fa-phone f-s-14"></i></a></li>
                        <li><a href="#" data-toggle="keterangan" data-placement="bottom" title="Whatsapp"><i class="fa fa-whatsapp f-s-14"></i></a></li>
                        <li><a href="#" data-toggle="keterangan" data-placement="bottom" title="Facebook"><i class="fa fa-facebook f-s-14"></i></a></li>
                        <li><a href="#" data-toggle="keterangan" data-placement="bottom" title="Instagram"><i class="fa fa-instagram f-s-14"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END #top-nav -->

        <!-- BEGIN #header -->
        <div id="header" class="header" data-fixed-top="true">
            <div class="container">
                <div class="header-container">
                    <div class="navbar-header">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/front/img/madiun-logo.png') }}" style="float:left; margin:6px 12px 6px 10px;">
                            </a>
                        </div>
                    </div>
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            @if (Auth::user())
                            <li>
                                <div class="buttons">
                                    <a type="button" class="loginatas biru" href="{{ route('user.beranda') }}">HALAMAN ADMIN</a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="buttons">
                                    <a type="button" class="loginatas biru" href="javascript:void()" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOG OUT</a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @else
                            <li>
                                <div class="buttons">
                                    <a type="button" class="loginatas biru" href="{{ route('login') }}">LOGIN</a>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #header -->