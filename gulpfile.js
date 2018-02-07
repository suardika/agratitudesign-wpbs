const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass');
const purify = require('gulp-purifycss');
const imagemin = require('gulp-imagemin');
const cleanCSS = require('gulp-clean-css');
const purge = require('gulp-css-purge');
const multiDest = require('gulp-multi-dest');
const destOptions = {
    mode: 0755
};


// dev Task - Move JS Files to dev/js
gulp.task('js-dev', function(){
  return gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/jquery/dist/jquery.js',
    'node_modules/popper.js/dist/umd/popper.js',
    'node_modules/owl.carousel/dist/owl.carousel.js',
    'node_modules/jquery.easing/jquery.easing.js',
    'node_modules/superfish/dist/js/superfish.js',
    'node_modules/wow.js/dist/wow.js',
    'node_modules/jquery.counterup/jquery.counterup.js',    
    ])
    .pipe(gulp.dest("dev/js"))
});

// assets Task - Move JS Files to assets/js
gulp.task('js-assets', function(){
  return gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/jquery.easing/jquery.easing.min.js',
    'node_modules/superfish/dist/js/superfish.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'node_modules/jquery.counterup/jquery.counterup.min.js',
    ])
    .pipe(gulp.dest("assets/js"))
});

// dev Task - Move CSS Files to dev/css
gulp.task('css-dev', function(){
  return gulp.src([
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.css',
    'node_modules/animate.css/animate.css',
    'node_modules/font-awesome/css/font-awesome.css',
    ])
    .pipe(gulp.dest("dev/css"))
});

// assets Task - Move CSS Files to assets/css
gulp.task('css-assets', function(){
  return gulp.src([
    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    ])
    .pipe(gulp.dest("assets/css"))
});

// multi Task - Move JS themescript to dev and assets
gulp.task('themejs-multidest', function(){
  return gulp.src(['src/themescript.js'])
    .pipe(multiDest(['dev/js', 'assets/js'], destOptions));
});

// multi Task - Move Fonts Folder to dev and assets
gulp.task('fonts-multidest', function(){
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(multiDest(['dev/fonts', 'assets/fonts'], destOptions));
});

// multi Task - Move and compress image to dev and assets
gulp.task('img-multidest', function(){
  return gulp.src('src/img/**/*')
    .pipe(imagemin({
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [{removeViewBox: true}]
    }))
    .pipe(multiDest(['dev/img', 'assets/img'], destOptions));
});

// src Task - Move Bootstrap SCSS to src/boostrap
gulp.task('bs4-src', function(){
  return gulp.src('node_modules/bootstrap/scss/**/*')
    .pipe(gulp.dest("src/bootstrap"))
});

// dev Task - Task Compile Sass & Inject Into Browser
gulp.task('sass', function(){
  return gulp.src([
    'src/bootstrap/bootstrap.scss',
    'src/themestyle.scss'
    ])
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(gulp.dest("dev/css"))
});

// prod Task - Task purify-css to assets css
gulp.task('purify-boot', function() {
  return gulp.src(['dev/css/bootstrap.css'])
    .pipe(purify(['dev/js/*.js', '**/*.php']))
    .pipe(gulp.dest('assets/css'));
});

// prod Task - Task purify-css to assets css
gulp.task('purge-theme', function() {
  return gulp.src(['dev/css/themestyle.css'])
    .pipe(purge())
    .pipe(gulp.dest('assets/css'));
});

// watch task & browserSync Server
gulp.task('serve', function(){
  browserSync.init({
    proxy: 'telagabali.test',
    port: 8080
  });
  gulp.watch(['src/bootstrap/**/*.scss', 'src/*.scss'], ['sass']);
  gulp.watch(['src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,svg,SVG}'], ['img-multidest']);
  gulp.watch(['src/themescript.js'], ['themejs-multidest']);
  // gulp.watch(['dev/css/bootstrap.css'], ['purify-boot']);
  // gulp.watch(['dev/css/themestyle.css'], ['purge-theme']);
  gulp.watch(['**/*.php', 'dev/css/*.css', 'dev/js/*.js', 'src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,svg,SVG}']).on('change', browserSync.reload);
});

gulp.task('start', ['js-dev', 'css-dev', 'fonts-multidest', 'bs4-src', 'js-assets', 'css-assets']); //start build static refresh libs
gulp.task('main', ['sass', 'themejs-multidest', 'img-multidest']); // shoud be watch main process automatically
gulp.task('end', ['purify-boot', 'purge-theme']); // just for finishing asset production
gulp.task('default', ['serve']); // will watch main process

