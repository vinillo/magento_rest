var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.less([
        'global.less',
        'boot.less',
        'header.less',
        'footer.less',
        'nav.less',
        'overview.less',
        'variables.less',
        'awesomefont.less',
        'sweetalert.less',
        'jquery.modal.less',
        'errors.less',
    ], 'public/css/main.css');
});


elixir(function(mix) {
    mix.scripts([
        'jquery.js',
        'cookie.js',
        'menu.js',
        'sweetalert.js',
        'jquery.modal.min.js',
        'main.js',
    ]);
});