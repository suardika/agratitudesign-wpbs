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

WEB LINK
========
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Owl Carosel -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/venobox.css">
<link rel="stylesheet" href="css/style.css">

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- All Plugin js -->
<script src="js/plugin.min.js"></script>
<!-- Custom js -->
<script src="js/custom.js"></script>


UPDATE GIT LATEST MASTER
========================

git fetch origin
git reset --hard origin/master


PURIFYCSS
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


GRUNT FTP
=========

$ npm install --save-dev grunt-ftp

require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks 

upload :
--------

grunt.initConfig({
    ftpPut: {
        options: {
            host: 'website.com',
            user: 'johndoe',
            pass: '1234'
        },
        upload: {
            files: {
                'public_html': 'src/*'
            }
        }
    }
});
 
grunt.registerTask('default', ['ftpPut']);

download:
--------

require('load-grunt-tasks')(grunt); // npm install --save-dev load-grunt-tasks 
 
grunt.initConfig({
    ftpGet: {
        options: {
            host: 'website.com',
            user: 'johndoe',
            pass: '1234'
        },
        download: {
            files: {
                'public_html/file.txt': 'src/file.txt'
            }
        }
    }
});
 
grunt.registerTask('default', ['ftpGet']);

--

host
Required
Type: string

port
Type: number
Default: 21

user
Type: string
Default: 'anonymous'

pass
Type: string
Default: '@anonymous'