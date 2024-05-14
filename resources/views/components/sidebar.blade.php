@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="">PERSYARATAN YUDISIUM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="">PERSYARATAN YUDISIUM</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <!-- profile ganti password -->
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Ganti Password</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('blank-page') ?  : '' }}">
                <a class="nav-link" href="{{ url('blank-page') }}"><i class="far fa-square"></i> <span>Batch Yudisium</span></a>
            </li>
            <li class="{{ Request::is('data_mhs') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_mhs') }}"><i class="far fa-square"></i> <span> Data Mahasiswa </span></a>
            </li>
            <li class="{{ Request::is('data_prodi') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_prodi') }}"><i class="far fa-square"></i> <span> Data Prodi </span></a>
            </li>
            <li class="{{ Request::is('data_pt') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_pt') }}"><i class="far fa-square"></i> <span> Data Perguruan Tinggi </span></a>
            </li>

        </ul>
    </aside>
</div>
@endauth
