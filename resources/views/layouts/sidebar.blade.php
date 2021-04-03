<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Logo -->
    <a style="height: auto" class="sidebar-brand d-flex align-items-center justify-content-center flex-column"
       href="{{ route('home') }}">
        <div class="sidebar-brand-icon bg-white rounded mb-2">
            <img src="{{ asset('img/logo.png') }}" width="50">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
        <small>Sistem Informasi Layanan Tahanan</small>
    </a>
    <!-- END Logo -->

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

    <li class="nav-item{{ request()->is('data_pengunjung') || request()->is('data_pengunjung/*') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#data_pengunjung"
           aria-expanded="false"
           aria-controls="data_pengunjung">
            <i class="fas fa-fw fa-business-time"></i>
            <span>{{ __('layouts.data_pengunjung') }}</span>
        </a>
        <div id="data_pengunjung" class="collapse{{ request()->is('data_pengunjung') || request()->is('data_pengunjung/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ request()->is('data_pengunjung') ? ' active' : '' }}"
                   href="{{ route('data_pengunjung.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('kunjungan/create') ? ' active' : '' }}"
                   href="{{ route('data_pengunjung.create') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('kunjungan') || request()->is('kunjungan/*') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#kunjungan"
           aria-expanded="false"
           aria-controls="kunjungan">
            <i class="fas fa-fw fa-business-time"></i>
            <span>{{ __('layouts.kunjungan') }}</span>
        </a>
        <div id="kunjungan" class="collapse{{ request()->is('kunjungan') || request()->is('kunjungan/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ request()->is('kunjungan') ? ' active' : '' }}"
                   href="{{ route('kunjungan.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('kunjungan/create') ? ' active' : '' }}"
                   href="{{ route('kunjungan.create') }}">{{ __('layouts.create') }}</a>
            </div>
        </div>
    </li>

{{--    <hr class="sidebar-divider">--}}

{{--    @if(auth()->user()->roles === 'TU-PEGAWAI')--}}

{{--    <div class="sidebar-heading">--}}
{{--        {{ __('layouts.kelola_pengguna') }}--}}
{{--    </div>--}}

{{--    <li class="nav-item{{ request()->is('pengguna') || request()->is('pengguna/*') ? ' active' : '' }}">--}}
{{--        <a class="nav-link{{ request()->is('pengguna') ? '' : ' collapsed' }}"--}}
{{--           href="javascript:void(0)" data-toggle="collapse" data-target="#pengguna" aria-expanded="false"--}}
{{--           aria-controls="pengguna">--}}
{{--            <i class="fas fa-fw fa-user"></i>--}}
{{--            <span>{{ __('layouts.pengguna') }}</span>--}}
{{--        </a>--}}
{{--        <div id="pengguna" class="collapse{{ request()->is('pengguna') || request()->is('pengguna/*') ? ' show' : '' }}"--}}
{{--             aria-labelledby="headingPages"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item{{ request()->is('pengguna') ? ' active' : '' }}"--}}
{{--                   href="{{ route('pengguna.index') }}">{{ __('layouts.index') }}</a>--}}
{{--                <a class="collapse-item{{ request()->is('pengguna/create') ? ' active' : '' }}"--}}
{{--                   href="{{ route('pengguna.create') }}">{{ __('layouts.create') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

{{--    @endif--}}

    <hr class="sidebar-divider">

    @if(auth()->user()->roles === 'TU-PEGAWAI')
    <div class="sidebar-heading">
        {{ __('layouts.kelola_data') }}
    </div>

    <li class="nav-item{{ request()->is('pengguna') || request()->is('pengguna/*') ? ' active' : '' }}">
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

    <li class="nav-item{{ request()->is('hakim') || request()->is('hakim/*') ? ' active' : '' }}">
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

    <li class="nav-item{{ request()->is('jaksa')  || request()->is('jaksa/*')? ' active' : '' }}">
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

    <li class="nav-item{{ request()->is('narapidana') || request()->is('narapidana/*') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#narapidana"
           aria-expanded="false"
           aria-controls="narapidana">
            <i class="fas fa-fw fa-person-booth"></i>
            <span>{{ __('layouts.narapidana') }}</span>
        </a>
        <div id="narapidana" class="collapse{{ request()->is('narapidana') || request()->is('narapidana/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item{{ request()->is('narapidana') ? ' active' : '' }}"
                   href="{{ route('narapidana.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('narapidana/create') ? ' active' : '' }}"
                   href="{{ route('narapidana.create') }}">{{ __('layouts.create') }}</a>

            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('sidang') || request()->is('sidang/*')? ' active' : '' }}">
        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#sidang"
           aria-expanded="false"
           aria-controls="sidang">
            <i class="fas fa-fw fa-person-booth"></i>
            <span>{{ __('layouts.sidang') }}</span>
        </a>
        <div id="sidang" class="collapse{{ request()->is('sidang') || request()->is('sidang/*') ? ' show' : '' }}"
             aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item{{ request()->is('sidang') ? ' active' : '' }}"
                   href="{{ route('sidang.index') }}">{{ __('layouts.index') }}</a>

                <a class="collapse-item{{ request()->is('sidang/create') ? ' active' : '' }}"
                   href="{{ route('sidang.create') }}">{{ __('layouts.create') }}</a>

            </div>
        </div>
    </li>

    @endif

{{--    <hr class="sidebar-divider">--}}

{{--    <div class="sidebar-heading">--}}
{{--        {{ __('layouts.layanan') }}--}}
{{--    </div>--}}

{{--    <li class="nav-item{{ request()->is('kunjungan') || request()->is('kunjungan/*') ? ' active' : '' }}">--}}
{{--        <a class="nav-link collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#kunjungan"--}}
{{--           aria-expanded="false"--}}
{{--           aria-controls="kunjungan">--}}
{{--            <i class="fas fa-fw fa-business-time"></i>--}}
{{--            <span>{{ __('layouts.kunjungan') }}</span>--}}
{{--        </a>--}}
{{--        <div id="kunjungan" class="collapse{{ request()->is('kunjungan') || request()->is('kunjungan/*') ? ' show' : '' }}"--}}
{{--             aria-labelledby="headingPages"--}}
{{--             data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item{{ request()->is('kunjungan') ? ' active' : '' }}"--}}
{{--                   href="{{ route('kunjungan.index') }}">{{ __('layouts.index') }}</a>--}}

{{--                <a class="collapse-item{{ request()->is('kunjungan/create') ? ' active' : '' }}"--}}
{{--                   href="{{ route('kunjungan.create') }}">{{ __('layouts.create') }}</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <hr class="sidebar-divider">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
