<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-asterisk" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bantuan Pupuk</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item @if(Route::is('criteria.view')) active @endif">
        <a class="nav-link" href="{{ route('criteria.view') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Data Kriteria</span>
        </a>
    </li>

    <li class="nav-item @if(Route::is('subcrit.view')) active @endif">
        <a class="nav-link" href="{{ route('subcrit.view') }}">
            <i class="fa fa-th-list" aria-hidden="true"></i>
            <span>Data Sub Kriteria</span>
        </a>
    </li>

    <li class="nav-item @if(Route::is('candidate.view')) active @endif">
        <a class="nav-link" href="{{ route('candidate.view') }}">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Data Calon</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-calculator" aria-hidden="true"></i>
            <span>Perhitungan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Perbandingan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Master User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-address-book" aria-hidden="true"></i>
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Data Profile</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
