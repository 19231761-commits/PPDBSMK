<div class="welcome-card" style="background: linear-gradient(135deg, #6D28D9 0%, #8B5CF6 100%); border-radius: 16px; padding: 40px; color: white; margin-bottom: 30px; box-shadow: 0 10px 25px rgba(109, 40, 217, 0.2); border: none;">
    <h2 style="font-size: 28px; font-weight: 800; margin-bottom: 12px; font-family: 'Poppins', sans-serif;">
        <i class="{{ $icon ?? 'fas fa-wave-hand' }}" style="margin-right: 10px;"></i> {{ $title }}
    </h2>
    <p style="font-size: 16px; opacity: 0.95; margin-bottom: 0; line-height: 1.6;">{{ $slot }}</p>
</div>
