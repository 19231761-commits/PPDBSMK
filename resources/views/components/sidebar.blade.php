<aside class="app-sidebar">
    <div class="sidebar-inner">
        <div class="brand">
            <img src="{{ asset('backend/images/logoo_remove.png') }}" alt="Logo" class="brand-logo">
            <div class="brand-title">PPDB SMK Sehati Karawang</div>
        </div>

        <nav class="nav-main">
            <ul>
                <li class="nav-item {{ Request::is('backend/beranda*') ? 'active' : '' }}">
                    <a href="{{ route('backend.beranda') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="nav-label">Beranda</span>
                    </a>
                </li>
                @if(Auth::user()->role == 'pendaftar')
                <li class="nav-item {{ Request::is('backend/pendaftaran*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pendaftaran.form') }}">
                        <i class="mdi mdi-account-plus"></i>
                        <span class="nav-label">Pendaftaran Saya</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('backend/form-pemesanan-baju*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesanan.baju') }}">
                        <i class="mdi mdi-tshirt-crew"></i>
                        <span class="nav-label">Pemesanan Baju</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('backend/form-pemesanan-buku*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesanan.buku') }}">
                        <i class="mdi mdi-book-open-page-variant"></i>
                        <span class="nav-label">Pemesanan Buku</span>
                    </a>
                </li>
                @endif

                <li class="nav-item {{ Request::is('backend/pengumuman*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pengumuman.index') }}">
                        <i class="mdi mdi-bell"></i>
                        <span class="nav-label">Informasi</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/pembayaransantri*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pembayaransantri.index') }}">
                        <i class="mdi mdi-credit-card"></i>
                        <span class="nav-label">Pembayaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('backend.v_login.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout"></i>
                        <span class="nav-label">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('backend.v_login.logout') }}" method="GET" style="display:none"></form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
