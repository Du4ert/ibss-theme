var gulp = require('gulp');
var browserSync = require('browser-sync').create();

// Static server
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "archive.localhost"
    });
});

gulp.task('css', function() {
    var sass = require('gulp-sass');
    var postcss = require('gulp-postcss');
    var autoprefixer = require('autoprefixer');

    return gulp.src('./css/sass/*.scss')
        .pipe(sass({
            outputStyle: 'nested',
            includePaths: ['./node_modules/susy/sass']
        }).on('error', sass.logError))
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(gulp.dest('./css'));
});

gulp.task('css:watch', function() {
    gulp.watch('./css/sass/*.scss', gulp.parallel('css'));
});
