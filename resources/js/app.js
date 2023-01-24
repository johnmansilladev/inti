import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import jQuery from 'jquery';
import intlTelInput from 'intl-tel-input';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

window.$ = jQuery;

window.intlTelInput = intlTelInput;


