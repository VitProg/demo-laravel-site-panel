var gulp = require('gulp');
var bower = require('gulp-bower');
var elixir = require('laravel-elixir');

gulp.task('bower', function () {
    return bower();
});

var paths = {
    'jquery':                     '/bower_components/jquery/dist',
    'bootstrap':                  '/bower_components/bootstrap/dist',
    'angular':                    '/bower_components/angular'
};

elixir.config.sourcemaps = false;


elixir(function(mix) {

    // Run bower install
    mix.task('bower');

    // Copy fonts straight to public
    mix.copy(paths.bootstrap + '/fonts/**', 'public/res/fonts');

    //mix.copy(paths.angular + '/angular.min.js', 'public/res/angular.min.js');

    // Merge Site CSSs.
    mix.styles([
            '../../..' + paths.bootstrap + '/css/bootstrap.min.css'
        ],
        'public/res/site.min.css');

    // Merge Site scripts.
    mix.scripts([
            '../../..' + paths.jquery + '/jquery.min.js',
            '../../..' + paths.bootstrap + '/js/bootstrap.min.js',
            '../../..' + paths.angular + '/angular.min.js',
            '../../..' + paths.angular + '-resource/angular-resource.min.js'
        ], 'public/res/site.min.js');
});