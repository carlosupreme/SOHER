import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import persist from '@alpinejs/persist'

window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(persist);

Alpine.start();

document.addEventListener('keydown', e => {
    if (e.key === "Escape" && location.hash === "#work.show-photo") {
        location.hash = "";
    } else {
        return false;
    }
})
