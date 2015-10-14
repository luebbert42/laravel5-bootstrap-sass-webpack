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


var paths = {
    'jquery': './resources/assets/vendor/jquery/',
    'bootstrap': './resources/assets/vendor/bootstrap-sass/'
}

elixir(function(mix) {
    mix.livereload();

    mix.sass("app.scss", 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets/']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.jquery + "dist/jquery.js",
            paths.bootstrap + "assets/javascripts/bootstrap.js"
        ], './public/js/', 'public/js/app.js');

    /*

    mix.scripts([
     'vendor/jquery/dist/jquery.min.js',
     'js/app.js'
    ], 'public/js/app.js', 'resources/assets/');



    mix.copy(
        'js/app.js',
        'public/js/app.js'
    );*/
});
