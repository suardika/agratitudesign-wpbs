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
        src: ['*.html', '*.php', 'dist/*.js'], // Observed files
        css: ['dev/themestyle.prefix.css'], // Take all css files into consideration
        dest: 'dev/themestyle.purify.css'// Write to this path
      },
      target2: {
        src: ['*.html', '*.php', 'dist/*.js'], // Observed files
        css: ['dev/bootstrap.prefix.css'], // Take all css files into consideration
        dest: 'dev/bootstrap-theme.purify.css'// Write to this path
      }
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
          dest: 'dist/css',
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
          dest: 'dist/img/'
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
            cwd: 'src/',
            src: '**/*.js',
            dest: 'dist/js/',
            ext: '.min.js'
        }]
      } //my_target
    }, //uglify

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
            '**/*.css',
            '**/*.js',
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
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');
  
  // define default task
  grunt.registerTask('default', ['browserSync', 'watch']);
}