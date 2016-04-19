var elixir = require('laravel-elixir');
var gulp = require("gulp");

require('laravel-elixir-livereload');

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





elixir(function(mix) {

    var paths = {
        'vendor': './resources/assets/vendor/',
        'fontawesome': './resources/assets/vendor/font-awesome/',
        'theme': './resources/assets/theme/',
        'css': './resources/assets/css/',
        'js': './resources/assets/js/',
    }

    mix.livereload();

    mix.sass("app.scss", "public/css", {
        includePaths: [
            paths.vendor + 'bootstrap-sass/stylesheets',
            paths.fontawesome + '/scss'
        ]
    });

    mix.styles([
        paths.css + 'custom-theme.css'
    ], 'public/theme/css/theme.css');



    mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')

    mix.scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "assets/javascripts/bootstrap.js"
        ], './', 'public/js/app.js');
});
