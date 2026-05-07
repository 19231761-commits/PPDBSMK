<div class="sticky-preview">
    <div class="preview-card">
        @if(isset($image))
            <img src="{{ $image }}" alt="Preview" class="img-fluid">
        @else
            <div class="preview-placeholder">Preview</div>
        @endif
    </div>
</div>
