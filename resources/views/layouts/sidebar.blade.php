<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a style="height: auto" class="sidebar-brand d-flex align-items-center justify-content-center flex-column"
       href="{{ route('home') }}">
        <div class="sidebar-brand-icon bg-white rounded mb-2">
            <img src="{{ asset('img/logo.png') }}" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
        <small>Sistem Informasi Layanan Tahanan</small>
    </a>
    <!-- END Brand -->

    <hr class="sidebar-divider my-3">

    <div class="sidebar-heading">
        {{ __('layouts.utama') }}
    </div>
    <li class="nav-item{{ request()->is('dashboard') ? ' active' : '' }}">
        <a class="nav-link " href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>{{ __('layouts.dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item{{ request()->is('biodata') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('biodata.index') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>{{ __('layouts.biodata') }}</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        {{ __('layouts.kelola_pengguna') }}
    </div>

    <li class="nav-item{{ request()->is('pengguna') ? ' active' : '' }}">
        <a class="nav-link{{ request()->is('pengguna') ? '' : ' collapsed' }}"
           href="javascript:void(0)" data-toggle="collapse" data-target="#pengguna" aria-expanded="false"
           aria-controls="pengguna">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('layouts.pengguna') }}</span>
        </a>
        <div id="pengguna" class="collapse{{ request()->is('pengguna') || request()->is('pengguna/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ request()->is('pengguna') ? ' active' : '' }}"
                   href="{{ route('pengguna.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item{{ request()->is('pengguna/create') ? ' active' : '' }}"
                   href="{{ route('pengguna.create') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        {{ __('layouts.kelola_data') }}
    </div>

    <li class="nav-item{{ request()->is('hakim') ? ' active' : '' }}">
        <a class="nav-link collapsed{{ request()->is('hakim') ? '' : ' collapsed' }}"
           href="javascript:void(0)" data-toggle="collapse" data-target="#hakim" aria-expanded="false"
           aria-controls="hakim">
            <i class="fas fa-fw fa-hammer"></i>
            <span>{{ __('layouts.hakim') }}</span>
        </a>
        <div id="hakim" class="collapse{{ request()->is('hakim') || request()->is('hakim/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item{{ request()->is('hakim') ? ' active' : '' }}"
                   href="{{ route('hakim.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('hakim/create') ? ' active' : '' }}"
                   href="{{ route('hakim.create') }}">{{ __('layouts.create') }}</a>

            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('jaksa') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#jaksa"
           aria-expanded="false"
           aria-controls="jaksa">
            <i class="fas fa-fw fa-people-arrows"></i>
            <span>{{ __('layouts.jaksa') }}</span>
        </a>
        <div id="jaksa" class="collapse{{ request()->is('jaksa') || request()->is('jaksa/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item{{ request()->is('jaksa') ? ' active' : '' }}"
                   href="{{ route('jaksa.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('jaksa/create') ? ' active' : '' }}"
                   href="{{ route('jaksa.create') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('narapidana') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#narapidana"
           aria-expanded="false"
           aria-controls="narapidana">
            <i class="fas fa-fw fa-person-booth"></i>
            <span>{{ __('layouts.narapidana') }}</span>
        </a>
        <div id="narapidana" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('narapidana.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('narapidana.index') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{ __('layouts.layanan') }}
    </div>

    <li class="nav-item{{ request()->is('kunjungan') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#kunjungan"
           aria-expanded="false"
           aria-controls="kunjungan">
            <i class="fas fa-fw fa-business-time"></i>
            <span>{{ __('layouts.kunjungan') }}</span>
        </a>
        <div id="kunjungan" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kunjungan.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('kunjungan.index') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
