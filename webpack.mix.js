var mix = require('laravel-mix');

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

//前台
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

//后台
mix.js('resources/assets/js/admin/app.js', 'public/js/admin')

mix.scripts([
    'public/vendor/adminlte/dist/js/adminlte.js',
    'resources/assets/js/admin/admin.js',
], 'public/js/admin/all.js');


mix.styles([
    'public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css',
    'public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css',
    'public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css',
    'node_modules/sweetalert/dist/sweetalert.css',
    'public/vendor/adminlte/dist/css/AdminLTE.min.css',
], 'public/css/admin.css');

mix.version();