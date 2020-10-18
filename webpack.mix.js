const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');




mix.styles([
    'public/assets_admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'public/assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'public/assets_admin/plugins/jqvmap/jqvmap.min.css',
    'public/assets_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'public/assets_admin/plugins/daterangepicker/daterangepicker.css',
    'public/assets_admin/plugins/summernote/summernote-bs4.css',
    'public/assets_admin/dist/css/adminlte.min.css',
    'public/assets_admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css',
], 'public/assets_admin/styleMix.css').version();


mix.scripts([
    'public/assets_admin/plugins/jquery/jquery.min.js',
    'public/assets_admin/plugins/datatables/jquery.dataTables.js',
    'public/assets_admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js',
    'public/assets_admin/plugins/jquery-ui/jquery-ui.min.js',
    'public/assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/assets_admin/plugins/chart.js/Chart.min.js',
    'public/assets_admin/plugins/sparklines/sparkline.js',
    'public/assets_admin/plugins/jqvmap/jquery.vmap.min.js',
    'public/assets_admin/plugins/jqvmap/maps/jquery.vmap.usa.js',
    'public/assets_admin/plugins/jquery-knob/jquery.knob.min.js',
    'public/assets_admin/plugins/moment/moment.min.js',
    'public/assets_admin/plugins/daterangepicker/daterangepicker.js',
    'public/assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'public/assets_admin/plugins/summernote/summernote-bs4.min.js',
    'public/assets_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'public/assets_admin/dist/js/adminlte.js',
    'public/assets_admin/dist/js/pages/dashboard.js',
    'public/assets_admin/dist/js/demo.js',

], 'public/assets_admin/script.js').version();
