module.exports = function(grunt) {

    grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    /**
     * Sass Task
     */
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'none',
        },
        files: {
          'dev/style-human.css': 'src/style.scss'
        }
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'none',
        },
        files: {
          'dev/style.css': 'src/style.scss'
        }
      }
    },

    /**
     * uglify task
     */
    uglify: {
      my_script: {
        files: {
          'dist/bootstrap.min.js': ['src/lib/bootstrap/js/bootstrap.js'],
          'dist/telaga.min.js': ['src/lib/telaga.js']
        } //files
      } //my_target
    }, //uglify

    /**
     * autoprefixer task
     */
    autoprefixer: {
        options: {
          browsers: ['last 2 versions', 'ie 8', 'ie 9']
        },
        //prefix all files
        multiple_files: {
          expand: true,
          flatten: true,
          src: [
            'dev/style-human.css',
            'dev/style.css'
          ],
          dest: 'dist/'
        }
    },

    /*browserSync*/
      browserSync: {
          dev: {
            bsFiles: {
                src : [
                  'style.css',
                  '**/*.php',
                  'js/*.js'
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
      css: {
        files: '**/*.scss',
        tasks: ['sass', 'autoprefixer']
      }
    }

  });
  // load npm tasks
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // define default task
  grunt.registerTask('default', ['browserSync', 'uglify', 'watch']);
}