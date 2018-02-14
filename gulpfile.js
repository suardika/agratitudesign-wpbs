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

// Remove Task - Remove assets Files
gulp.task('remove', function () {
  return gulp.src(['assets'], {read: false})
    .pipe(clean());
});

// Static Task - Build Static Library Files
gulp.task('build', function(){
  var ass_js_min = gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/popper.js/dist/umd/popper.min.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
    'node_modules/jquery.easing/jquery.easing.min.js',
    'node_modules/superfish/dist/js/superfish.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'node_modules/jquery.counterup/jquery.counterup.min.js',
    'node_modules/ekko-lightbox/dist/ekko-lightbox.min.js',
    'node_modules/html5shiv/dist/html5shiv.min.js',
    'node_modules/skip-link-focus/skip-link-focus.min.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/slicknav/dist/jquery.slicknav.min.js',
    'node_modules/form-validator/validators.js', 
    'node_modules/form-validator/formvalidator.js',
    'node_modules/counterup/jquery.counterup.min.js',
    'node_modules/inview/inview.js',
    'node_modules/scroll-top/dist/min/scroll-top.min.js', 
    'node_modules/mixitup/dist/mixitup.min.js', 
    ])
    .pipe(gulp.dest("assets/js"));
  var ass_css_min = gulp.src([
    'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/ekko-lightbox/dist/ekko-lightbox.css',
    'node_modules/magnific-popup/dist/magnific-popup.css',
    'node_modules/slicknav/dist/slicknav.min.css',  
    ])
    .pipe(gulp.dest("assets/css"));
  var ass_fonts = gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(multiDest(['assets/fonts'], destOptions));
  var src_bs4_scss = gulp.src('node_modules/bootstrap/scss/**/*')
    .pipe(gulp.dest("src/bootstrap"));
});

// Dynamic Task - Rebuild Dynamic exlib Files
gulp.task('exlib', function(){
  return gulp.src(['src/exlib/**/*'])
    .pipe(multiDest(['assets/exlib'], destOptions));
});

// Dynamic Task - Rebuild Dynamic JS Files
gulp.task('themejs', function(){
  return gulp.src(['src/themescript.js'])
    .pipe(multiDest(['assets/js'], destOptions));
});

// Dynamic Task - Rebuild Dynamic Imagemin Files
gulp.task('imagemin', function(){
  return gulp.src('src/img/**/*')
    .pipe(imagemin({
      interlaced: true,
      progressive: true,
      optimizationLevel: 5,
      svgoPlugins: [{removeViewBox: true}]
    }))
    .pipe(multiDest(['assets/img'], destOptions));
});
// Dynamic Task - Compile Sass Files and Autoprefixer
gulp.task('sass', function(){
  return gulp.src([
    'src/themestyle.scss'
    ])
    .pipe(sass())
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(multiDest(['assets/css'], destOptions));
});

// Finishing Task - Purify and Purge css Files
gulp.task('minify', function() {
  return gulp.src([
    'assets/css/themestyle.css'
    ])
    .pipe(purify(['assets/js/**/*.js', '**/*.php']))
    .pipe(purge())
    .pipe(rename({
      suffix: ".min",
      extname: ".css"
    }))
    .pipe(gulp.dest("assets/css/"))
});

// Watch task & browserSync Server
gulp.task('serve', function(){
  browserSync.init({
    proxy: 'telagabali.test',
    port: 8080
  });
  gulp.watch(['src/**/*.scss'], ['sass']).on('change', browserSync.reload);
  gulp.watch(['src/exlib/**/*'], ['exlib']).on('change', browserSync.reload);
  gulp.watch(['src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,svg,SVG}'], ['imagemin']).on('change', browserSync.reload);
  gulp.watch(['src/themescript.js'], ['themejs']).on('change', browserSync.reload);
  gulp.watch(['**/*.php', 'assets/**/*']).on('change', browserSync.reload);
});

gulp.task('move', ['remove']);
gulp.task('init', ['build', 'exlib', 'themejs', 'imagemin', 'sass']);
gulp.task('finish', ['minify']);
gulp.task('default', ['serve']);

