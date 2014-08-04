// Setting up Sass, MinifyCSS, and Autoprefixer
var gulp = require('gulp');
    sass = require('gulp-ruby-sass');
    autoprefixer = require('gulp-autoprefixer');
    minifycss = require('gulp-minify-css');
    rename = require('gulp-rename');

gulp.task('styles', function() {
  return gulp.src('assets/scss/*.scss')
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest('assets/css'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(gulp.dest('assets/css'));
});

module.exports = gulp;


// // Bower Main Files
// var mainBowerFiles = require('main-bower-files');

// gulp.task('bower', function(){
//   return gulp.src(mainBowerFiles( /* options */ ), { base: 'assets/bower_components' })
//     .pipe( /* what do we do with the files? */ )
// });

gulp.task('default', function () {
  gulp.watch('assets/scss/*.scss', ['styles']);
});