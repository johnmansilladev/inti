import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import jQuery from 'jquery';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

window.$ = jQuery;