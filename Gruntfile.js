module.exports = function(grunt) {

    grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


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
        '!assets/css/presets/**',
        'assets/js/*',
        'assets/img/*',
        'assets/fonts/*',
        'src/*',     
        '!src/img',
        '!src/*.js',
        '!src/*.scss',     
      ]
    },

    /**
     * Copy Task
     * this is second particular task
     * copying node_modules files to src
     */
    copy: {
      main:{
        files: [
        /**
         * copy bootstrap from node_modules to src
         */
        {
          expand: true,
          cwd: 'node_modules/bootstrap/scss',
          src: '**',
          dest: 'src/bootstrap/scss',
        },{
          expand: true,
          cwd: 'node_modules/bootstrap/dist/js',
          src: '**',
          dest: 'src/bootstrap/js',
        },
        /**
         * copy jquery js dependency from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/jquery/dist/',
          src: '**',
          dest: 'src/jquery',
        },
        /**
         * copy popper js dependency from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/popper.js/dist/',
          src: '**',
          dest: 'src/popper/',
        },
        /**
         * copy owl carousel js library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/',
          src: '*.js',
          dest: 'src/owl-carousel/js',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/dist/assets',
          src: '**',
          dest: 'src/owl-carousel/css',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/src/scss',
          src: '**',
          dest: 'src/owl-carousel/scss',
        },{
          expand: true,
          cwd: 'node_modules/owl.carousel/src/img',
          src: '**',
          dest: 'src/owl-carousel/img',
        },     
        /**
         * copy wow js library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/wow.js/dist/',
          src: '**',
          dest: 'src/wow-js/',
        },
        /**
         * copy superfish library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/superfish/dist/',
          src: '**',
          dest: 'src/superfish/',
        },
        /**
         * copy jquery.easing library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/jquery.easing/',
          src: '*.js',
          dest: 'src/jquery-easing/',
        },        
        /**
         * copy font-awesome library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/font-awesome/fonts/',
          src: '**',
          dest: 'src/font-awesome/fonts/',
        },{
          expand: true,
          cwd: 'node_modules/font-awesome/fonts/',
          src: '**',
          dest: 'assets/fonts/',
        },{
          expand: true,
          cwd: 'node_modules/font-awesome/css/',
          src: '**',
          dest: 'src/font-awesome/css/',
        }, 
        /**
         * copy animate.css library from node_modules
         */
        {
          expand: true,
          cwd: 'node_modules/animate.css/',
          src: ['animate.css', 'animate.min.css'],
          dest: 'src/animate.css/',
        }, 
        ]
      },
      js:{
        files: [
        {
          expand: true,
          cwd: 'src/bootstrap/js',
          src: ['bootstrap.bundle.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/jquery/',
          src: ['jquery.slim.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/owl-carousel/js',
          src: ['owl.carousel.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/popper/',
          src: ['popper.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/wow-js/',
          src: ['wow.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/superfish/js',
          src: ['superfish.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/jquery-easing/',
          src: ['jquery.easing.min.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/',
          src: ['customizer.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/',
          src: ['html5.js'],
          dest: 'assets/js/',
        },{
          expand: true,
          cwd: 'src/',
          src: ['skip-link-focus-fix.js'],
          dest: 'assets/js/',
        },
        ]
      },
      css:{
        files: [
        {
          expand: true,
          cwd: 'src/font-awesome/css',
          src: ['font-awesome.css'],
          dest: 'dev/css/',
        },{
          expand: true,
          cwd: 'src/owl-carousel/css',
          src: ['owl.carousel.css'],
          dest: 'dev/css/',
        },{
          expand: true,
          cwd: 'src/owl-carousel/css',
          src: ['owl.theme.default.css'],
          dest: 'dev/css/',
        },{
          expand: true,
          cwd: 'src/animate.css/',
          src: ['animate.css'],
          dest: 'dev/css/',
        },
        ]
      },
    },

    /**
     * Sass Task
     */
    sass: {
      target: {
        options: {
          style: 'expanded',
          sourcemap: 'none',
        },
        files: [
        {
          expand: true,
          cwd: 'src/bootstrap/scss',
          src: ['bootstrap.scss'],
          dest: 'dev/css',
          ext: '.css'
        },{
          expand: true,
          cwd: 'src/',
          src: ['themestyle.scss'],
          dest: 'dev/css',
          ext: '.css'
        },
        ]
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
        files: [
        {
          expand: true,
          flatten: true,
          cwd: 'dev/css',
          src: [
                'bootstrap.css',
                'themestyle.css',
                'font-awesome.css',
                'owl.carousel.css',
                'owl.theme.default.css',
                'animate.css',
              ],
          dest: 'dev/css',
          ext: '.prefix.css',
          extDot: 'last'
        },
        ]    
      }
    },

    /**
     * uglify task
     */
    uglify: {
      my_target: {
        options: {
          banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */',
          sourceMap: false,
        },
        files: [{
          expand: true,
          flatten: true,
          cwd: 'src/',
          src: ['theme-script.js',],
          dest: 'assets/js/',
          ext: '.min.js',
          extDot: 'last'
        }]
      } //my_target
    }, //uglify

    /**
     * purifycss Task
     */    
    purifycss: {
      options: {
        minify: false
      },
      target: {
        src: ['**/*.php', 'assets/js/*.js'], // Observed files
        css: ['dev/css/themestyle.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/themestyle.purify.css'// Write to this path
      },
      target2: {
        src: ['**/*.php', 'assets/js/*.js'], // Observed files
        css: ['dev/css/bootstrap.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/bootstrap.purify.css'// Write to this path
      },
      target3: {
        src: ['**/*.php'], // Observed files
        css: ['dev/css/font-awesome.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/font-awesome.purify.css'// Write to this path
      },
      target4: {
        src: ['**/*.php', 'assets/js/*.js'], // Observed files
        css: ['dev/css/owl.carousel.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/owl.carousel.purify.css'// Write to this path
      },
      target5: {
        src: ['**/*.php', 'assets/js/*.js'], // Observed files
        css: ['dev/css/owl.theme.default.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/owl.theme.default.purify.css'// Write to this path
      },
      target5: {
        src: ['**/*.php'], // Observed files
        css: ['dev/css/animate.prefix.css'], // Take all css files into consideration
        dest: 'dev/css/animate.purify.css'// Write to this path
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
          cwd: 'dev/css',
          src: ['*.purify.css'],
          dest: 'assets/css',
          ext: '.min.css',
          extDot: 'last'
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
          cwd: 'src/img',
          src: ['**/*.{gif,GIF,jpg,JPG,png,PNG,ico}'],
          dest: 'assets/img/'
        }]
      }
    },

    /**
     * Watch task
     */
    watch: {
      js: {
        files: 'src/theme-script.js',
        tasks: ['uglify']
      }, 
      scss: {
        files: 'src/**/*.scss',
        tasks: ['sass', 'autoprefixer', 'purifycss', 'cssmin']
      },
      css: {
        files: 'src/**/*.css',
        tasks: ['copy', 'autoprefixer', 'purifycss', 'cssmin']
      },
      image: {
        files: 'src/img/**/*.{gif,GIF,jpg,JPG,png,PNG,ico}',
        tasks: ['imagemin']
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

  grunt.registerTask('copy-all', ['copy']);
  grunt.registerTask('copy-js', ['copy:js']);
  grunt.registerTask('copy-css', ['copy:css']);

  grunt.registerTask('refresh', [
      'clean',
      'copy-all',
      'sass',
      'autoprefixer',
      'uglify',
      'purifycss',
      'cssmin',
      'imagemin',
  ]);

  grunt.registerTask('add', [
      'copy-all',
      'autoprefixer',
      'uglify',
      'purifycss',
      'cssmin',
      'imagemin',
  ]);

}

