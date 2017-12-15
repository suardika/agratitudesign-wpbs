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
          cwd: 'src/',
          src: ['*.scss'],
          dest: 'dev/',
          ext: '.human.css'
        }]
      }
    },

    /**
     * Css Clean Task
     * Remove duplicated css according to application priority
     */
    css_clean: {
      target: {
        options: {
          minify: false
        },
        files: [{
          expand: true,
          cwd: 'dev/',
          src: ['*.human.css'],
          dest: 'dev/',
          ext: '.clean.css'
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
          src: ['*.clean.css'],
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
        css: ['dev/*.prefix.css'], // Take all css files into consideration
        dest: 'dev/style.purify.css', // Write to this path
      }
    },

    /**
     * uglify task
     */
    uglify: {
      my_target: {
        options: {
          sourceMap: true,
        },
        files: {
          'dist/bootstrap.min.js': ['src/lib/bootstrap/js/bootstrap.js'],
          'dist/telaga.min.js': ['src/telaga.js']
        } //files
      } //my_target
    }, //uglify

    /**
     * browserSync
     */
    browserSync: {
      dev: {
        bsFiles: {
            src : [
              '**/*.css',
              'dist/**/*.js',
              '**/*.php'
            ]
        },
        options: {
          watchTask: true,
          proxy   : 'localhost/telaga'
        }
      }
    },

    /**
     * Watch task
     */
    watch: {
      sass: {
        files: 'src/*.scss',
        tasks: ['sass', 'css_clean', 'autoprefixer', 'purifycss']
      },
      js: {
        files: 'src/**/*.js',
        tasks: ['uglify']
      },
    }

  });
  // load npm tasks
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-css-clean');  
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-purifycss');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');
  
  // define default task
  grunt.registerTask('default', ['browserSync', 'watch']);
}