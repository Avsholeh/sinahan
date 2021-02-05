<!-- Sidebar -->
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-chair fa-21"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>
    <!-- END Brand -->

    <hr class="sidebar-divider my-0">

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
        {{ __('layouts.user_management') }}
    </div>

    <!-- <li class="nav-item active"> -->
    <li class="nav-item{{ request()->is('pengguna') ? ' active' : '' }}">
        <!-- class="nav-link collapsed" aria-expanded="false" -->
        <a class="nav-link{{ request()->is('pengguna') ? '' : ' collapsed' }}"
           href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="false"
           aria-controls="pengguna">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('layouts.pengguna') }}</span>
        </a>
        <!-- class="collapse show" -->
        <div id="pengguna" class="collapse{{ request()->is('pengguna') || request()->is('pengguna/add') ? ' show' : '' }}" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item{{ request()->is('pengguna') ? ' active' : '' }}"
                   href="{{ route('pengguna.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item{{ request()->is('pengguna/add') ? ' active' : '' }}"
                   href="{{ route('pengguna.add') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('jabatan') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jabatan" aria-expanded="false"
           aria-controls="jabatan">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>{{ __('layouts.jabatan') }}</span>
        </a>
        <div id="jabatan" class="collapse " aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('jabatan.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('jabatan.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('hak-akses') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hak_akses" aria-expanded="false"
           aria-controls="hak_akses">
            <i class="fas fa-fw fa-key"></i>
            <span>{{ __('layouts.hak_akses') }}</span>
        </a>
        <div id="hak_akses" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('hak-akses.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('hak-akses.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        {{ __('layouts.data_management') }}
    </div>

    <li class="nav-item{{ request()->is('hakim') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hakim" aria-expanded="false"
           aria-controls="hakim">
            <i class="fas fa-fw fa-hammer"></i>
            <span>{{ __('layouts.hakim') }}</span>
        </a>
        <div id="hakim" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('hakim.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('hakim.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('jaksa') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jaksa" aria-expanded="false"
           aria-controls="jaksa">
            <i class="fas fa-fw fa-people-arrows"></i>
            <span>{{ __('layouts.jaksa') }}</span>
        </a>
        <div id="jaksa" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('jaksa.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('jaksa.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('narapidana') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#narapidana" aria-expanded="false"
           aria-controls="narapidana">
            <i class="fas fa-fw fa-person-booth"></i>
            <span>{{ __('layouts.narapidana') }}</span>
        </a>
        <div id="narapidana" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('narapidana.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('narapidana.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{ __('layouts.layanan') }}
    </div>

    <li class="nav-item{{ request()->is('kunjungan') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kunjungan" aria-expanded="false"
           aria-controls="kunjungan">
            <i class="fas fa-fw fa-business-time"></i>
            <span>{{ __('layouts.kunjungan') }}</span>
        </a>
        <div id="kunjungan" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('kunjungan.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('kunjungan.index') }}">{{ __('layouts.add') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item{{ request()->is('dokumen') ? ' active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dokumen" aria-expanded="false"
           aria-controls="dokumen">
            <i class="fas fa-fw fa-business-time"></i>
            <span>{{ __('layouts.dokumen') }}</span>
        </a>
        <div id="dokumen" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('dokumen.index') }}">{{ __('layouts.index') }}</a>
                <a class="collapse-item" href="{{ route('dokumen.index') }}">{{ __('layouts.add') }}</a>
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
