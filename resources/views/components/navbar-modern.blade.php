<header class="app-topbar">
    <div class="topbar-left">
        <button id="sidebarToggle" class="btn-icon" type="button" aria-label="Toggle sidebar">
            <i class="mdi mdi-menu"></i>
        </button>
        <h1 class="topbar-title mb-0">{{ $pageTitle ?? 'Dashboard' }}</h1>
    </div>

    <div class="topbar-right">
        <!-- Notification Icon -->
        <button class="btn-icon" type="button" title="Notifikasi">
            <i class="mdi mdi-bell-outline"></i>
        </button>

        <!-- User Profile Dropdown -->
        <div class="dropdown">
            <button class="btn-icon dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Profil">
                <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #6D28D9, #8B5CF6); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <span class="dropdown-item-text">
                        <small style="color: #6B7280;">Logged in as</small>
                        <div style="font-weight: 600; color: #1F2937;">{{ Auth::user()->name }}</div>
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline"></i> Profil</a></li>
                <li><a class="dropdown-item" href="#"><i class="mdi mdi-cog-outline"></i> Pengaturan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="{{ route('backend.login.logout') }}" onclick="return confirm('Apakah Anda yakin ingin keluar?')"><i class="mdi mdi-logout"></i> Keluar</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function() {
                document.body.classList.remove('sidebar-open');
            });
        }
    });
</script>
