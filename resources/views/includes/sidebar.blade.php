<ul class="navbar-nav bg-white sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.view') }}">
        <div class="sidebar-brand-icon rotate-n-15 text-primary">
            <i class="fa fa-asterisk" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-primary">Bantuan Pupuk</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Route::is('dashboard.view')) active @endif">
        <a class="nav-link text-primary" href="{{ route('dashboard.view') }}">
            <i class="fas fa-fw fa-tachometer-alt text-primary"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-primary">
        Master Data
    </div>

    @if(Auth::user()->role == 1)
        <li class="nav-item @if(Route::is('criteria.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('criteria.view') }}">
                <i class="fas fa-fw fa-chart-area text-primary"></i>
                <span>Data Kriteria</span>
            </a>
        </li>

        <li class="nav-item @if(Route::is('subcrit.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('subcrit.view') }}">
                <i class="fa fa-th-list text-primary" aria-hidden="true"></i>
                <span>Data Sub Kriteria</span>
            </a>
        </li>

        <li class="nav-item @if(Route::is('candidate.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('candidate.view') }}">
                <i class="fa fa-users text-primary" aria-hidden="true"></i>
                <span>Data Calon</span>
            </a>
        </li>

        <li class="nav-item @if(Route::is('calculate.view') || Route::is('calculate.result')) active @endif">
            <a class="nav-link text-primary" href="{{ route('calculate.view') }}">
                <i class="fa fa-calculator text-primary" aria-hidden="true"></i>
                <span>Perhitungan</span>
            </a>
        </li>

        <li class="nav-item @if(Route::is('compare.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('compare.view') }}">
                <i class="fas fa-fw fa-chart-area text-primary"></i>
                <span>Perbandingan (Hasil Akhir)</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading text-primary">
            Master User
        </div>

        <li class="nav-item @if(Route::is('user.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('user.view') }}">
                <i class="fa fa-address-book text-primary" aria-hidden="true"></i>
                <span>Data User</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" type="button" class="nav-link text-primary" data-toggle="modal" data-target="#editUserModal">
                <i class="fa fa-user text-primary" aria-hidden="true"></i>
                <span>Data Profile</span>
            </a>
        </li>
    @else
        <li class="nav-item @if(Route::is('compare.view')) active @endif">
            <a class="nav-link text-primary" href="{{ route('compare.view') }}">
                <i class="fas fa-fw fa-chart-area text-primary"></i>
                <span>Perbandingan (Hasil Akhir)</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="sidebar-heading text-primary">
            Master User
        </div>

        <li class="nav-item">
            <a href="#" type="button" class="nav-link text-primary" data-toggle="modal" data-target="#editUserModal">
                <i class="fa fa-user text-primary" aria-hidden="true"></i>
                <span>Data Profile</span>
            </a>
        </li>
    @endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0 btn btn-primary" id="sidebarToggle"></button>
    </div>

</ul>
