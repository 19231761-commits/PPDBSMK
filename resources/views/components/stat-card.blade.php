<div class="stat-card">
    <div class="stat-card-content">
        <div class="stat-label">{{ $label }}</div>
        <div class="stat-value">{{ $value }}</div>
        @if(isset($subtitle))
            <div class="stat-subtitle">{{ $subtitle }}</div>
        @endif
    </div>
    @if(isset($icon))
        <div class="stat-icon {{ $icon_class ?? '' }}">
            <i class="mdi {{ $icon }}"></i>
        </div>
    @endif
</div>

<style>
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border-left: 4px solid #6D28D9;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
    }

    .stat-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .stat-card.primary { border-left-color: #6D28D9; }
    .stat-card.secondary { border-left-color: #8B5CF6; }
    .stat-card.success { border-left-color: #10B981; }
    .stat-card.warning { border-left-color: #F59E0B; }
    .stat-card.danger { border-left-color: #EF4444; }
    .stat-card.info { border-left-color: #3B82F6; }

    .stat-card-content {
        flex: 1;
    }

    .stat-label {
        font-size: 13px;
        font-weight: 600;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 32px;
        font-weight: 800;
        color: #1F2937;
        line-height: 1;
        margin-bottom: 4px;
        font-family: 'Poppins', sans-serif;
    }

    .stat-subtitle {
        font-size: 13px;
        color: #9CA3AF;
        font-weight: 500;
    }

    .stat-icon {
        font-size: 48px;
        opacity: 0.12;
        color: #6D28D9;
        text-align: right;
        line-height: 1;
    }

    .stat-icon.primary { color: #6D28D9; }
    .stat-icon.secondary { color: #8B5CF6; }
    .stat-icon.success { color: #10B981; }
    .stat-icon.warning { color: #F59E0B; }
    .stat-icon.danger { color: #EF4444; }
    .stat-icon.info { color: #3B82F6; }

    @media (max-width: 768px) {
        .stat-card {
            flex-direction: column;
        }

        .stat-value {
            font-size: 24px;
        }

        .stat-icon {
            margin-top: 12px;
            text-align: left;
        }
    }
</style>
