module.exports = function (grunt) {
  grunt.initConfig({
    pkg : grunt.file.readJSON('package.json'),

    /*Sass Task*/
    sass: {
      dev: {
        options: {
          style: 'expanded',
          sourcemap: 'none'
        },
        files: {
          'compiled/style-human.css' : 'sass/style.scss'
        }
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: 'none'
        },
        files: {
          'compiled/style.css' : 'sass/style.scss'
        }
      }
    },

    /*Autoprefixer*/
    autoprefixer: {
      options: {
        browsers: ['last 2 versions']
      },
      //prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src: 'compiled/*.css',
        dest: ''
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
        }
      },
      options: {
        watchTask: true,
        proxy   : 'localhost/telaga'
      }
    },

    /*Watch task*/
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass', 'autoprefixer']
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.registerTask('default', ['browserSync','watch']);

};
