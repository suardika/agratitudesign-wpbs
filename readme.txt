=== agratitudesign telaga ===

Contributors: automattic
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready

Requires at least: 4.0
Tested up to: 4.8
Stable tag: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE

A starter theme called agratitudesign telaga.

--

// please remove after this

//    <!-- Bootstrap CSS -->
//    <link rel="stylesheet" href="css/bootstrap.min.css">
//    <!-- Owl Carosel -->
//    <link rel="stylesheet" href="css/owl.carousel.min.css">
//    <link rel="stylesheet" href="css/owl.theme.default.min.css">

//    <link rel="stylesheet" href="css/font-awesome.min.css">
//    <link rel="stylesheet" href="css/animate.css">
//    <link rel="stylesheet" href="css/venobox.css">
// <link rel="stylesheet" href="css/style.css">

// <!-- jQuery first, then Popper.js, then Bootstrap JS -->
// <script src="js/jquery.min.js"></script>
// <script src="js/popper.min.js"></script>
// <script src="js/bootstrap.min.js"></script>
// <!-- All Plugin js -->
// <script src="js/plugin.min.js"></script>
// <!-- Custom js -->
// <script src="js/custom.js"></script>

purifycss
==========

npm install grunt-purifycss -g
npm install grunt-purifycss --save-dev
grunt.loadNpmTasks('grunt-purifycss');

grunt.initConfig({
  purifycss: {
    options: {},
    target: {
      src: ['test/fixtures/*.html', 'test/fixtures/*.js'],
      css: ['test/fixtures/*.css'],
      dest: 'tmp/purestyles.css'
    },
  },
});


