const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
        .scripts([
            'libs/bootstrap-select.js',
            'libs/sweetalert-dev.js',
            'libs/moment.js',
            'libs/bootstrap-datepicker.js',
            'libs/bootstrap-datepicker.es.js'
        ],
        './public/js/libs.js')
        .styles([
            'libs/bootstrap-select.css',
            'libs/sweetalert.css',
            'libs/dataTables.bootstrap.min.css',
            'libs/bootstrap-datepicker3.css'
        ],
        './public/css/libs.css')
       .webpack('app.js');

    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/build/fonts/bootstrap');

    mix.version(['css/app.css', 'css/libs.css', 'js/app.js', 'js/libs.js']);

    mix.browserSync({
        proxy: 'almacen.dev'
    });
});
