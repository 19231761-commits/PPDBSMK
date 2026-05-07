import './bootstrap';

// Bootstrap JS (ESM). Popper is handled via dependency.
import * as bootstrap from 'bootstrap';

// Expose for inline scripts if any view expects window.bootstrap.
window.bootstrap = bootstrap;
