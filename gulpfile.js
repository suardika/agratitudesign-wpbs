const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const sass = require('gulp-sass');
const purify = require('gulp-purifycss');
const imagemin = require('gulp-imagemin');
const cleanCSS = require('gulp-clean-css');
const purge = require('gulp-css-purge');
const multiDest = require('gulp-multi-dest');
const rename = require("gulp-rename");
const clean = require('gulp-clean');
const destOptions = {
    mode: 0755
};

// Remove Task - Remove Assets Files
gulp.task('remove', function () {
  return gulp.src('assets', {read: false})
    .pipe(clean());
});

// Build Task - Rebuild Assets Files
gulp.task('rebuild', function(){
  var asscss = gulp.src('node_modules/mdbootstrap/css/**/*')
    .pipe(gulp.dest("assets/css"));
  var assfont = gulp.src('node_modules/mdbootstrap/font/**/*')
    .pipe(gulp.dest("assets/font"));
  var assfont_fontawesome = gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest("assets/font/font-awesome"));
  var asscss_fontawesome = gulp.src([
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    ])
    .pipe(gulp.dest("assets/css/font-awesome"));
  var assimg = gulp.src('node_modules/mdbootstrap/img/**/*')
    .pipe(gulp.dest("assets/img"));
  var assjs = gulp.src('node_modules/mdbootstrap/js/**/*')
    .pipe(gulp.dest("assets/js"));
  var assjs_owl = gulp.src([
    'node_modules/owl.carousel/dist/owl.carousel.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    ])
    .pipe(gulp.dest("assets/js/owl"));
  var asscss_owl = gulp.src([
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.css',
    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
    ])
    .pipe(gulp.dest("assets/css/owl"));
  var assjs = gulp.src('node_modules/mdbootstrap/js/**/*')
    .pipe(gulp.dest("assets/js"));
  var srcscss_mdb = gulp.src('node_modules/mdbootstrap/sass/**/*')
    .pipe(gulp.dest("src/mdb/scss"));
  var srcscss_bs4 = gulp.src('node_modules/bootstrap/scss/**/*')
    .pipe(gulp.dest("src/bootstrap/scss"));
});

// Image Task - Copy and Compress image source to assets
gulp.task('imagemin', function() {
  return gulp.src('src/img/**/*')
    .pipe(imagemin({
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [{removeViewBox: true}]
    }))
    .pipe(gulp.dest("assets/img/main"));
});

// Script Task - Move JS themescript from src to assets
gulp.task('themejs', function(){
  return gulp.src(['src/script.js'])
    .pipe(rename({
      prefix: "theme-",
      extname: ".js"
    }))
    .pipe(gulp.dest("assets/js/"));
});

// Sass Task - Compile Sass and Give Autoprefixer
gulp.task('sass', function(){
  return gulp.src([
    'src/bootstrap/scss/bootstrap.scss',
    'src/mdb/scss/mdb.scss',
    'src/style.scss'
    ])
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(rename({
      suffix: "-theme",
      extname: ".css"
    }))
    .pipe(gulp.dest("assets/css/"))
});

// Minify Task - Purify and Minify CSS
gulp.task('minify', function() {
  return gulp.src([
    'assets/css/bootstrap-theme.css',
    'assets/css/mdb-theme.css',
    'assets/css/style-theme.css'
    ])
    .pipe(purify(['assets/js/**/*.js', '**/*.php']))
    .pipe(purge())
    .pipe(rename({
      suffix: "min",
      extname: ".css"
    }))
    .pipe(gulp.dest("assets/css/"))
});

// watch task & browserSync Server
gulp.task('serve', function(){
  browserSync.init({
    proxy: 'telagabali.test',
    port: 8080
  });
  gulp.watch(['src/**/*.scss'], ['sass']);
  gulp.watch(['src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,svg,SVG}'], ['imagemin']);
  gulp.watch(['src/script.js'], ['themejs']);
  gulp.watch(['**/*.php', 'assets/css/**/*.css', 'assets/js/**/*.js', 'src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,svg,SVG}']).on('change', browserSync.reload);
});

gulp.task('move', ['remove']);
gulp.task('init', ['rebuild', 'imagemin', 'themejs', 'imagemin', 'themejs', 'sass']);
gulp.task('main', ['imagemin', 'themejs', 'sass']);
gulp.task('end', ['minify']);
gulp.task('default', ['serve']);

