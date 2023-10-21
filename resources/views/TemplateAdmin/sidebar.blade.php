<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <i class="fa-solid fa-screwdriver-wrench"></i>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt {{ (request()->is('dashboard')) ? 'fa-beat' : '' }}"></i>
            <span>Dashboard</span></a>
    </li> --}}

    <!-- Heading Fitur Admin-->
    <div class="sidebar-heading">
        <br>
        <center>FITUR ADMIN</center> 
    </div>

    <!-- Informasi Desa -->
    <li class="nav-item {{ (request()->is('informasidesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('informasidesa')}}">
            <i class="fa-solid fa-circle-info {{ (request()->is('informasidesa')) ? 'fa-beat' : '' }}"></i>
            <span>Informasi Desa</span></a>
    </li>
    
    <!-- Berita Desa -->
    <li class="nav-item {{ (request()->is('beritadesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('beritadesa')}}">
            <i class="fa-solid fa-newspaper {{ (request()->is('beritadesa')) ? 'fa-beat' : '' }}"></i>
            <span>Berita Desa</span></a>
    </li>

    <!-- Event Desa -->
    <li class="nav-item {{ (request()->is('eventdesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('eventdesa')}}">
            <i class="fa-regular fa-calendar-days {{ (request()->is('eventdesa')) ? 'fa-beat ' : '' }}"></i>
            <span>Event Desa</span></a>
    </li>

    <!-- Wisata Desa -->
    <li class="nav-item {{ (request()->is('wisatadesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('wisatadesa')}}">
            <i class="fa-solid fa-tree {{ (request()->is('wisatadesa')) ? 'fa-beat' : '' }}"></i></i>
            <span>Wisata Desa</span></a>
    </li>

    <!-- Kuliner Desa -->
    <li class="nav-item {{ (request()->is('kulinerdesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('kulinerdesa')}}">
            <i class="fa-solid fa-bowl-food {{ (request()->is('kulinerdesa')) ? 'fa-beat' : '' }}"></i>
            <span>Kuliner Desa</span></a>
    </li>

    <!-- Data Trip/Perjalanan -->
    <li class="nav-item {{ (request()->is('tripdesa')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('tripdesa')}}">
            <i class="fa-solid fa-car-side {{ (request()->is('tripdesa')) ? 'fa-beat' : '' }}"></i>
            <span>Data Trip/Perjalanan</span></a>
    </li>

    <!-- Verifikasi Pesanan -->
    <li class="nav-item {{ (request()->is('pesanan')) ? 'active' : '' }}">
        <a class="nav-link" href="{{route('pesanan')}}">
            <i class="fa-regular fa-circle-check {{ (request()->is('pesanan')) ? 'fa-beat' : '' }}"></i>
            <span>Data Pemesanan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>