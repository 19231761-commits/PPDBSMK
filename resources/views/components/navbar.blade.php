<header class="app-topbar">
    <div class="topbar-inner">
        <button id="sidebarToggle" class="btn-icon">
            <i class="mdi mdi-menu"></i>
        </button>

        <div class="topbar-right">
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <img src="{{ asset('backend/images/user.png') }}" alt="User" class="user-avatar">
            </div>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var toggle = document.getElementById('sidebarToggle');
        toggle && toggle.addEventListener('click', function(){
            document.body.classList.toggle('mini-sidebar');
        });
    });
</script>
