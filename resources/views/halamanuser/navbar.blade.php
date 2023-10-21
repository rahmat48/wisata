<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow" id="mainNav">
    <div class="container px-4">
        <a class="navbar-brand" href="#page-top" style="color: ">Wisata Wunut</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{route('home')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('userberitadesa')) ? 'active' : '' }}" href="{{route('userberitadesa')}}">Berita</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('userinformasidesa')) ? 'active' : '' }}" href="{{route('userinformasidesa')}}">Profile</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('userwisata')) ? 'active' : '' }}" href="{{route('userwisata')}}">Wisata</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('usereventdesa')) ? 'active' : '' }}" href="{{route('usereventdesa')}}">Event</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('userkulinerdesa')) ? 'active' : '' }}" href="{{route('userkulinerdesa')}}">Kuliner</a></li>
                <li class="nav-item"><a class="nav-link {{ (request()->is('trip')) ? 'active' : '' }}" href="{{route('trip')}}">Trip</a></li>
                {{-- Login --}}
                @if (Route::has('login'))
                    @auth
                    <div>
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: white">Selamat Datang, {{Auth::user()->name}}</span>
                    </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('detailpesanan')}}">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                History Pemesanan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                    @else
                        <li class="nav-item"><a class="nav-link" style="color: white" href="{{ route('login') }}">Login</a></li>
                    @endauth
                    @endif
                   
            </ul>
        </div>
    </div>
</nav>