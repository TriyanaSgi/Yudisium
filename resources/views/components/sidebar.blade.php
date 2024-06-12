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
        @if (auth()->user()->role == 'mahasiswa' || auth()->user()->role == 'pt' || auth()->user()->role == 'superadmin')
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
        @endif

            <!-- profile ganti password -->
            @if (auth()->user()->role == 'superadmin')
            <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li>
            @endif

            @if (auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Ganti Password</span></a>
            </li>
            @endif

            @if (auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('hakakses/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses/') }}"><i class="fas fa-low-vision"></i> <span>Hak Akses</span></a>
            </li>
            @endif

            <li class="menu-header">Starter</li>

            @if (auth()->user()->role == 'pt' || auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('batch') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('batch') }}"><i class="fas fa-university"></i> <span>Batch Yudisium</span></a>
            </li>
            @endif

            @if (auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('mahasiswa') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('mahasiswa') }}"><i class="fas fa-university"></i> <span> Data Mahasiswa </span></a>
            </li>
            @endif

            @if (auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('prodi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('prodi') }}"><i class="fas fa-university"></i> <span> Data Prodi </span></a>
            </li>
            @endif

            @if (auth()->user()->role == 'superadmin')
            <li class="{{ Request::is('pt') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('pt') }}"><i class="fas fa-university"></i> <span> Data Perguruan Tinggi </span></a>
            </li>
            @endif
           

        </ul>
    </aside>
</div>
@endauth
