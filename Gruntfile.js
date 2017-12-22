module.exports = function(grunt) {

    grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Sass Task
     */
    sass: {
      target: {
        options: {
          style: 'expanded',
          sourcemap: 'none',
        },
        files: [{
          expand: true,
          cwd: 'src/scss',
          src: ['*.scss'],
          dest: 'dev/',
          ext: '.human.css'
        }]
      }
    },

    /**
     * autoprefixer task
     */
    autoprefixer: {
      target:{
        options: {
          browsers: ['last 2 versions', 'ie 8', 'ie 9']
        },
        //prefix all files
        files: [{
          expand: true,
          flatten: true,
          cwd: 'dev/',
          src: ['*.human.css'],
          dest: 'dev/',
          ext: '.prefix.css'
        }]    
      }
    },

    /**
     * purifycss Task
     */    
    purifycss: {
      options: {
        minify: false
      },
      target: {
        src: ['*.html', '*.php', 'assets/*.js'], // Observed files
        css: ['dev/themestyle.prefix.css'], // Take all css files into consideration
        dest: 'dev/themestyle.purify.css'// Write to this path
      },
    },

    /**
     * Css Minify Task
     */
    cssmin: {
      target: {
        options: {},
        files: [{
          expand: true,
          cwd: 'dev/',
          src: ['*.purify.css'],
          dest: 'assets/css',
          ext: '.min.css'
        }]
      }
    },

    /**
     * imagemin Task
     */
    imagemin: {
      dynamic: {
        options: {
          optimizationLevel: 3,
        },
        files: [{
          expand: true,
          cwd: 'src/',
          src: ['**/*.{gif,GIF,jpg,JPG,png,PNG}'],
          dest: 'assets/img/'
        }]
      }
    },

    /**
     * uglify task
     */
    uglify: {
      my_target: {
        options: {
          banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */',
          sourceMap: true,
        },
        files: [{
          expand: true,
          flatten: true,
          cwd: 'src/js',
          src: '*.js',
          dest: 'assets/js/',
          ext: '.min.js'
        }]
      } //my_target
    }, //uglify

    /**
     * Clean Task
     * Everytime you make the change the path structure
     * you need to clean the file dest
     * this is particular task with command grunt clean
     */
    clean: {
      devassets: [
        'dev/*',
        'assets/css/*',
        'assets/js/*',
        'assets/img/*',
        'src/scss/bootstrap/*',
        'src/js/bootstrap/*',
        'src/js/jquery/*',
        'src/js/popper/*',
        '!assets/library/*'
      ]
    },

    /**
     * Copy Task
     * this is second particular task
     */
    copy: {
      main:{
        files: [
        /**
         * copy boostrap scss and js from npm node_modules files
         * more complete files to src, and compres file to assets directory
         */
        {
          expand: true,
          cwd: 'node_modules/bootstrap/scss',
          src: '**',
          dest: 'src/scss/bootstrap',
        },{
          expand: true,
          cwd: 'node_modules/bootstrap/dist/js',
          src: '**',
          dest: 'src/js/bootstrap',
        },{
          expand: true,
          cwd: 'node_modules/bootstrap/dist/js',
          src: ['bootstrap.min.js','bootstrap.min.js.map'],
          dest: 'assets/js/',
        },
        /**
         * copy jquery js dependency from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/jquery/dist/',
          src: '**',
          dest: 'src/js/jquery',
        },{
          expand: true,
          cwd: 'node_modules/jquery/dist/',
          src: ['jquery.slim.min.js','jquery.slim.min.map'],
          dest: 'assets/js/',
        },
        /**
         * copy popper js dependency from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/popper.js/dist/',
          src: '**',
          dest: 'src/js/popper/',
        },{
          expand: true,
          cwd: 'node_modules/popper.js/dist/',
          src: ['popper.min.js','popper.min.js.map'],
          dest: 'assets/js/',
        },
        /**
         * copy owl carousel js library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/',
          src: '*.js',
          dest: 'src/js/owl.carousel/',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/',
          src: ['owl.carousel.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/',
          src: '*.js',
          dest: 'src/js/owl.carousel/',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/',
          src: ['owl.carousel.min.js'],
          dest: 'assets/js/',
        },
        ]
      }
    },

    /**
     * Watch task
     */
    watch: {
      sass: {
        files: 'src/**/*.scss',
        tasks: ['sass', 'autoprefixer', 'purifycss', 'cssmin']
      },
      image: {
        files: 'src/**/*.{gif,GIF,jpg,JPG,png,PNG}',
        tasks: ['imagemin']
      },
      js: {
        files: 'src/**/*.js',
        tasks: ['uglify']
      },
    },

    /**
     * browserSync
     */
    browserSync: {
      dev: {
        bsFiles: {
          src : [
            'assets/**/*.css',
            'assets/**/*.js',
            'assets/**/*.{gif,GIF,jpg,JPG,png,PNG}',
            '**/*.php'
          ]
        },
        options: {
          watchTask: true,
          proxy   : 'localhost/telaga'
        }
      }
    },
  });

  // load npm tasks
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-purifycss');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');
  
  // define default task
  grunt.registerTask('default', ['browserSync', 'watch']);
  grunt.registerTask('libfresh', ['clean', 'copy']);
}