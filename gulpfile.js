var gulp = require('gulp');
var runSequence = require('run-sequence');
var concat = require('gulp-concat');
var del = require('del');
var minify = require('gulp-minifier');
var cleanCSS = require('gulp-clean-css');
var stripCssComments = require('gulp-strip-css-comments');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');
var sequence = require('gulp-watch-sequence');
var livereload = require('gulp-livereload');
var rename = require("gulp-rename");



//var argv    = require('yargs').argv;



var PATHS = {
    appCSS: [
        'assets/scss/main.scss'
    ],
    vendorCSS: [
        'bower_components/css3-animate-it/css/animations.css',
        'bower_components/fancybox/dist/jquery.fancybox.min.css'
    ],
    vendorJS: [
        // Vendor scripts
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/tether/dist/js/tether.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/owl.carousel/src/js/owl.carousel.js',
        'bower_components/html5shiv/dist/html5shiv.min.js',
        'bower_components/respond/dest/respond.min.js',
        'bower_components/masonry-layout/dist/masonry.pkgd.min.js',
        'bower_components/css3-animate-it/js/css3-animate-it.js',
        'bower_components/fastclick/lib/fastclick.js',
        'bower_components/dropkick/dist/dropkick.js',
        'bower_components/fancybox/dist/jquery.fancybox.min.js',
    ],
    appJS: [
        'assets/js/general.js',
        'assets/js/gmaps-markerwithlabel-1.9.1.min.js',
        'assets/js/custom-script-karoon.js'
    ]
}
gulp.task('clean', function() {
    return del([
        'public/css/main.css',
        'public/js/main.js'
    ]);
});



gulp.task('sass', function() {
    gulp.src(PATHS.vendorCSS)
        .pipe(concat('vendor.css'))
        .pipe(minify({ minify: true, minifyCSS: true }))
        .pipe(rename("scss/vendor/vendor.scss"))
        .pipe(gulp.dest("assets"));

    return gulp.src(PATHS.appCSS)
        .pipe(sass())
        .pipe(concat('main.css'))
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(stripCssComments({ preserve: false }))
        .pipe(minify({ minify: true, minifyCSS: true }))
        .pipe(gulp.dest('public/css'))
        .on('end', function() {
            livereload.changed('main.css');
        })
});


gulp.task('vendorJS', function() {
    return gulp.src(PATHS.vendorJS)
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('public/js/'));
});
gulp.task('customJS', function() {
    return gulp.src(PATHS.appJS)
        .pipe(concat('main.js'))
        .pipe(minify({ minify: true, minifyJS: true }))
        .pipe(gulp.dest('public/js/'));
});

/*gulp.task('images', function() {
    return gulp.src('assets/images/*.!(db)')
        .pipe(gulp.dest('public/images'));
});*/

gulp.task('livereload', function() {
    livereload.reload();
});

gulp.task('build', function(cb) {
    runSequence('clean', ['sass', 'vendorJS', 'customJS'], cb);
});
gulp.task('default', ['build'], function() {
    livereload.listen();
    gulp.watch(['assets/js/**/*.js'], ['customJS']);
    gulp.watch(['assets/scss/**/*.scss'], ['sass']);
   // gulp.watch(['assets/images/**/*'], ['images']);
    gulp.watch(['assets/**'], ['livereload']);
});