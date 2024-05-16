@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <div class="card-header text-center d-flex justify-content-center">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/avatar/image.png')}}"alt="Sispek" class="img-fluid" style="width: 110px;">
        </div>
            </div>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <div class="card-header text-center d-flex justify-content--center">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('img/avatar/image.png')}}"alt="sispek" class="img-fluid mt-2" style="width: 40px;">
        </div>
        </div>
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
            <li class="{{ Request::is('hakakses/index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses/index') }}"><i class="fas fa-key"></i> <span>Hak Akses</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('batchyudisium/data_batch_yudisium') ?  : '' }}">
                <a class="nav-link" href="{{ url('batchyudisium/data_batch_yudisium') }}"><i class="fas fa-university"></i> <span>Batch Yudisium</span></a>
            </li>
            <li class="{{ Request::is('data_mhs') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_mhs') }}"><i class="fas fa-university"></i> <span> Data Mahasiswa </span></a>
            </li>
            <li class="{{ Request::is('data_prodi') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_prodi') }}"><i class="fas fa-university"></i> <span> Data Prodi </span></a>
            </li>
            <li class="{{ Request::is('data_pt') ?  : '' }}">
                <a class="nav-link" href="{{ url('datamhs/data_pt') }}"><i class="fas fa-university"></i> <span> Data Perguruan Tinggi </span></a>
            </li>

        </ul>
    </aside>
</div>
@endauth
