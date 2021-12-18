window._ = require('lodash');

window.$ = window.jQuery = require('jquery');
window.PerfectScrollbar = require('./assets/plugins/perfect-scrollbar.min');
require('./assets/plugins/bootstrap.bundle.min');
require('./assets/scripts/script.min');
require('bootstrap-tagsinput/src/bootstrap-tagsinput');
require('./assets/plugins/sidebar.large.script.min');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
