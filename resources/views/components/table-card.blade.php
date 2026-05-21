<div class="card table-card">
    @if(isset($title) || isset($headerActions))
        <div class="card-header d-flex align-items: center justify-content-between">
            @if(isset($title))
                <h5 class="card-title mb-0">{{ $title }}</h5>
            @endif
            @if(isset($headerActions))
                <div class="header-actions">
                    {{ $headerActions }}
                </div>
            @endif
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    {{ $header }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>

<style>
    .table-card {
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
        overflow: hidden;
        background: white;
    }

    .table-card .card-header {
        background: #F9FAFB;
        border-bottom: 1px solid #E5E7EB;
        padding: 20px 24px;
    }

    .table-card .card-title {
        font-size: 16px;
        font-weight: 700;
        color: #1F2937;
        margin: 0;
    }

    .table-card .table {
        margin-bottom: 0;
    }

    .table-card .table thead {
        background-color: #F9FAFB;
    }

    .table-card .table thead th {
        border: none;
        padding: 16px 24px;
        font-size: 13px;
        font-weight: 700;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background-color: #F9FAFB;
    }

    .table-card .table tbody td {
        padding: 16px 24px;
        border: none;
        border-bottom: 1px solid #F3F4F6;
        color: #374151;
        font-size: 14px;
    }

    .table-card .table tbody tr:hover {
        background-color: #F9FAFB;
    }

    .table-card .table tbody tr:last-child td {
        border-bottom: none;
    }

    .card-footer {
        padding: 16px 24px;
        border-top: 1px solid #E5E7EB;
        background: #F9FAFB;
    }

    .header-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    /* Badge styles */
    .badge {
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-primary {
        background-color: #DBEAFE;
        color: #1E40AF;
    }

    .badge-success {
        background-color: #D1FAE5;
        color: #065F46;
    }

    .badge-warning {
        background-color: #FEF3C7;
        color: #92400E;
    }

    .badge-danger {
        background-color: #FEE2E2;
        color: #991B1B;
    }

    @media (max-width: 768px) {
        .table-card .table thead th,
        .table-card .table tbody td {
            padding: 12px 16px;
            font-size: 12px;
        }

        .table-card .card-header {
            padding: 16px;
        }
    }
</style>
