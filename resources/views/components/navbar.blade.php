<header class="app-topbar">
    <button id="sidebarToggle" class="btn-icon" type="button" aria-label="Toggle sidebar">
        <i class="mdi mdi-menu"></i>
    </button>

    <div class="topbar-right">
        <div class="user-info">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <img src="{{ asset('backend/images/user.png') }}" alt="User" class="user-avatar">
        </div>
    </div>
</header>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('sidebarToggle');
        var overlay = document.getElementById('sidebarOverlay');

        if (!toggle) return;

        toggle.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                document.body.classList.toggle('sidebar-open');
            } else {
                document.body.classList.toggle('mini-sidebar');
            }
        });

        if (overlay) {
            overlay.addEventListener('click', function() {
                document.body.classList.remove('sidebar-open');
            });
        }
    });
</script>
