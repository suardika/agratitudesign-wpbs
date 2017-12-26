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

install node.js and install ruby
================================

cek npm and cek ruby

	npm -v
	ruby -v

install grunt and sass

	npm install -g grunt-cli
	gem install sass

	npm init

create devDependicies:

	npm install grunt --save-dev
	npm install grunt-contrib-sass --save-dev
	npm install grunt-contrib-watch --save-dev

run grunt to run sass:

	grunt

terminate task by:

	ctrl + c
	y


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

git reset --hard HEAD
git clean -xffd
git pull

git fetch origin
git reset --hard origin/master

rm -rf [project_folder]
git clone [remote_repo]


INSTALL BOWER optional
======================
    npm install -g bower
    bower.init
    bower search bootstrap
   
by default : bower_components
create file : .bowerrcc

{
    "directory": "path to the directory"
}

    bower install bootstrap

bower.json
    bower update
    bower uninstall

bower install bootstrap#v4.0.0-beta.2

----

NPM
===

npm install bootstrap@4.0.0-beta.2 --save

npm install popper.js@1.12.3 --save

npm install jquery@3.2.1 --save




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


GRUNT-CSS-CLEAN
================

npm install grunt-css-clean --save-dev
grunt.loadNpmTasks('grunt-css-clean');

grunt.initConfig({
  css_clean: {
    options: {},
    files: {
      'dest/default_options': ['src/testing', 'src/123'],
    },
  },
});

GRUNT-CONTRIB-IMAGEMIN
======================

npm install --save-dev grunt-contrib-imagemin

const mozjpeg = require('imagemin-mozjpeg');
 
grunt.initConfig({
    imagemin: {
        static: {
            options: {
                optimizationLevel: 3,
                svgoPlugins: [{removeViewBox: false}],
                use: [mozjpeg()] // Example plugin usage 
            },
            files: {
                'dist/img.png': 'src/img.png',
                'dist/img.jpg': 'src/img.jpg',
                'dist/img.gif': 'src/img.gif'
            }
        },
        dynamic: {
            files: [{
                expand: true,
                cwd: 'src/',
                src: ['**/*.{png,jpg,gif}'],
                dest: 'dist/'
            }]
        }
    }
});
 
grunt.loadNpmTasks('grunt-contrib-imagemin');
grunt.registerTask('default', ['imagemin']);


---

npm install grunt-contrib-sass --save-dev
npm install grunt-contrib-watch --save-dev
npm install grunt-autoprefixer --save-dev
npm install grunt-contrib-uglify --save-dev
npm install grunt-browser-sync --save-dev

npm install grunt-purifycss -g //no need
npm install grunt-css-clean -g //no need
npm install grunt-contrib-imagemin -g
npm install grunt-contrib-cssmin -g

npm install grunt-purifycss --save-dev
npm install grunt-css-clean --save-dev
npm install grunt-contrib-cssmin --save-dev
npm install grunt-contrib-imagemin --save-dev

grunt.loadNpmTasks('grunt-purifycss');
grunt.loadNpmTasks('grunt-css-clean');

npm install grunt-clean --save-dev
npm install grunt-clean -g

---


src:

dev:
	bootstrap.human.css
	bootstrap.clean.css	
	bootstrap.prefix.css
	bootstrap.purify.css
	
	theme.human.css
	theme.clean.css
	theme.prefix.css
	theme.purify.css
	
dist:
	bootstrap.min.css
	theme.min.css

TERMINAL.SUBLIME-SETTING
========================	
{
	// The command to execute for the terminal, leave blank for the OS default
	// See https://github.com/wbond/sublime_terminal#examples for examples
	"terminal": "C:\\Program Files\\Git\\git-bash.exe",

	// A list of default parameters to pass to the terminal, this can be
	// overridden by passing the "parameters" key with a list value to the args
	// dict when calling the "open_terminal" or "open_terminal_project_folder"
	// commands
	"parameters": ["-c", "cd \"%CWD%\" && \"C:\\Program Files\\Git\\bin\\sh.exe\" -i -l"],

	// An environment variables changeset. Default environment variables used for the
	// terminal are inherited from sublime. Use this mapping to overwrite/unset. Use
	// null value to indicate that the environment variable should be unset.
	"env": {}
}

npm install grunt-contrib-copy --save-dev

grunt.loadNpmTasks('grunt-contrib-copy');

npm install owl.carousel --save

npm install wow.js --save

npm install font-awesome --save
