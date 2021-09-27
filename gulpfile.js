'use strict';

var csso = require('gulp-csso');
var del = require('del');
var gulp = require('gulp');
var htmlmin = require('gulp-htmlmin');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var twig =require('gulp-twig');
var plumber = require('gulp-plumber');
var dest ="resources/assets/dist";
var src ={
    'styles' :'resources/assets/styles/all.scss',
    'scripts' :'resources/assets/script/*.js',
    'twig':'resources/views/Layouts/database/*.twig'
};
gulp.task('styles', function () {
    return gulp.src(src.styles)
        .pipe(sass({
            outputStyle: 'nested',
            precision: 10,
            includePaths: ['.'],
            onError: console.error.bind(console, 'Sass error:')
        }))
        .pipe(csso())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(dest))
});

gulp.task('scripts', function() {
    return gulp.src(src.scripts)
        .pipe(uglify())
        .pipe(concat('script.js'))
        .pipe(gulp.dest(dest))
});

gulp.task('clean', () => del([dest]));

gulp.task('default',gulp.series(
    'clean',
    'styles',
    'scripts'
));

gulp.task('twig', function () {
    return gulp.src([src.twig])

        .pipe(plumber({
            handleError: function (err) {
                console.log(err);
                console.log('hi');
                this.emit('end');
            }})
        )
        .pipe(twig().on('error', function (err) {
                process.stderr.write(err.message + '\n');
                this.emit('end');
            })
        )
        .pipe(gulp.dest(dest+'/twig'));
});
