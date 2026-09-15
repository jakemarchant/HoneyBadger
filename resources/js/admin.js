import jquery from 'jquery';

window.$ = window.jQuery = jquery;

import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'jquery.easing';
import './vendor/sb-admin-2.js';

function showToast(variant, text) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const bg = variant === 'danger' ? 'bg-danger' : 'bg-success';

    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white ${bg} border-0`;
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${text}</div>
            <button type="button" class="close mr-2 text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    `;

    container.appendChild(toast);

    window.$(toast).toast({ delay: 4000 }).toast('show');
    window.$(toast).on('hidden.bs.toast', () => toast.remove());
}

document.addEventListener('livewire:init', () => {
    Livewire.on('toast', ({ variant, text }) => showToast(variant, text));
});
