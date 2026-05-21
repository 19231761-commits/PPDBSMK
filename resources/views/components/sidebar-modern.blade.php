<aside class="app-sidebar">
    <div class="sidebar-brand">
        <img src="{{ asset('image/logo_sidebar.png') }}" alt="Logo PPDB">
        <div class="sidebar-brand-text">
            <div class="sidebar-brand-title">PPDB SMK</div>
            <div class="sidebar-brand-subtitle">Karawang</div>
        </div>
    </div>

    <nav class="nav-main">
        <ul class="list-unstyled">
            <!-- Beranda -->
            <li class="nav-item {{ Request::is('backend/beranda*') ? 'active' : '' }}">
                <a href="{{ route('backend.beranda') }}" title="Beranda">
                    <i class="mdi mdi-home-outline"></i>
                    <span>Beranda</span>
                </a>
            </li>

            @if(Auth::user()->role == 'admin_ppdb')
                <!-- Kelola Pendaftaran -->
                <li class="nav-item {{ Request::is('backend/pendaftaransantri*') || Request::is('backend/pendaftaran*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pendaftaransantri.index') }}" title="Kelola Pendaftaran">
                        <i class="mdi mdi-clipboard-list"></i>
                        <span>Kelola Pendaftaran</span>
                    </a>
                </li>

                <!-- Kelola Pemesanan Seragam -->
                <li class="nav-item {{ Request::is('backend/pemesananbaju*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesananbaju.index') }}" title="Kelola Pemesanan Seragam">
                        <i class="mdi mdi-tshirt-crew-outline"></i>
                        <span>Kelola Pemesanan Seragam</span>
                    </a>
                </li>

                <!-- Kelola Pemesanan Buku -->
                <li class="nav-item {{ Request::is('backend/pemesananbuku*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesananbuku.index') }}" title="Kelola Pemesanan Buku">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span>Kelola Pemesanan Buku</span>
                    </a>
                </li>

                <!-- Kelola Pembayaran -->
                <li class="nav-item {{ Request::is('backend/pembayaransantri*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pembayaransantri.index') }}" title="Kelola Pembayaran">
                        <i class="mdi mdi-credit-card-outline"></i>
                        <span>Kelola Pembayaran</span>
                    </a>
                </li>

                <!-- Kelola Pengumuman -->
                <li class="nav-item {{ Request::is('backend/pengumuman*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pengumuman.index') }}" title="Kelola Pengumuman">
                        <i class="mdi mdi-bell-outline"></i>
                        <span>Kelola Pengumuman</span>
                    </a>
                </li>
            @else
                <!-- Menu untuk Pendaftar -->
                <li class="nav-item {{ Request::is('backend/pendaftaran-saya*') || Request::is('backend/pendaftaransantri*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pendaftaran.form') }}" title="Form Pendaftaran">
                        <i class="mdi mdi-account-plus-outline"></i>
                        <span>Form Pendaftaran</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/form-pemesanan-baju*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesanan.baju') }}" title="Pemesanan Seragam">
                        <i class="mdi mdi-tshirt-crew-outline"></i>
                        <span>Pemesanan Seragam</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/form-pemesanan-buku*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pemesanan.buku') }}" title="Pemesanan Buku">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span>Pemesanan Buku</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/pembayaransantri*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pembayaransantri.index') }}" title="Pembayaran">
                        <i class="mdi mdi-credit-card-outline"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/pengumuman*') ? 'active' : '' }}">
                    <a href="{{ route('backend.pengumuman.index') }}" title="Pengumuman">
                        <i class="mdi mdi-bell-outline"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::is('backend/riwayat-pesanan*') ? 'active' : '' }}">
                    <a href="{{ route('backend.riwayat.pesanan') }}" title="Riwayat Pesanan">
                        <i class="mdi mdi-history"></i>
                        <span>Riwayat Pesanan</span>
                    </a>
                </li>
            @endif

            <!-- Divider -->
            <li style="margin: 16px 0; border-top: 1px solid rgba(255, 255, 255, 0.1);"></li>

            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ route('backend.login.logout') }}" title="Keluar" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                    <i class="mdi mdi-logout"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.getElementById('sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                if (window.innerWidth < 992) {
                    document.body.classList.toggle('sidebar-open');
                }
            });
        }
    });
</script>
