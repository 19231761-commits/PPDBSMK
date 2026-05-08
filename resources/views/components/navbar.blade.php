<header class="app-topbar header-minimal">
    <div class="topbar-left">
        <button id="sidebarToggle" class="btn-icon hamburger-btn" type="button" aria-label="Toggle sidebar">
            <span class="hamburger-box"><i class="mdi mdi-menu"></i></span>
        </button>
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
                document.body.classList.toggle('sidebar-closed');
            }
        });

        if (overlay) {
            overlay.addEventListener('click', function() {
                document.body.classList.remove('sidebar-open');
                document.body.classList.remove('sidebar-closed');
            });
        }
    });
</script>
