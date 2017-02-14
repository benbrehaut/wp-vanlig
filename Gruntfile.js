module.exports = function(grunt) {

    // Grunt configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        browserSync: {
            bsFiles: {
    			src: [
    				'*.php',
    				'**/*.php',
    				'Gruntfile.js',
    				'assets/js/*.js',
    				'*.css',
    				'assets/css/*.css'
    			]
    		},
    		options: {
    			watchTask: true,
    			debugInfo: true,
    			logConnections: true,
    			notify: true,
    			proxy: 'test-theme.uk',
    			ghostMode: {
    				scroll: true,
    				links: true,
    				forms: true
    			}
    		}
        },

        // Concat Task
        concat: {
            dist: {
                src: [
                    'assets/js/libs/**/*.js', // all js vendor files
                    'assets/js/main.js' // the main js file
                ],
                dest: 'assets/js/scripts.js', // concat it into one file
            },
        },
        // End Concat Task

        // Uglify Task
        uglify: {
            build: {
                src: 'assets/js/scripts.js', // take our concation file.
                dest: 'assets/js/scripts.min.js' // output out and minify it.
            }
        },
        // End Uglify Task

        // Sass Task
        sass: {
            options: {
                sourceMap: true,
                outputStyle: 'compressed'
            },
            dist: {
                files: {
                    'assets/css/style.css': 'assets/scss/style.scss'
                }
            },
        },
        // End Sass Task

        // Autoprefixer (PostCSS) Task
        postcss: {
          options: {
            map: true,
            processors: [
              require('autoprefixer')({
                browsers: ['last 25 versions']
              })
            ]
          },
          dist: {
            src: 'assets/css/style.css'
          }
        },
        // End Autoprefixer Task

        imagemin: {
            dynamic: {
              files: [{
                expand: true,
                cwd: 'assets/img/',
                src: ['**/*.{png,jpg,gif}'],
                dest: 'assets/img/'
              }]
            }
        },

        // Watch Task
        watch: {
            options: {
                dateFormat: function(time) {
                    grunt.log.writeln('Finished in ' + time + 'ms at ' + (new Date()).toString());
                    grunt.log.writeln('Waiting for more changes...');
                }
            },
            scripts: {
                files: 'assets/js/main.js', // The main JS file for the theme.
                tasks: ['concat', 'uglify'],
            },
            css: {
              files: 'assets/scss/**/*.scss',
              tasks: ['sass','postcss'],
            },
            browserSync: {
                files: [
                    '*.php',
                    '**/*.php',
                    '*.css',
                    'Gruntfile.js',
                    '*.css',
                    'assets/js/*.js',
                    'assets/css/*.css'
                ],
                options: {
                    watchTask: true
                }
            }
        },
        // End Watch


        // End Grunt Config
    });

    // Time Grunt
    require('time-grunt')(grunt);

    // Load the plugins.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');

    // Default task(s).
    grunt.registerTask('default', ['browserSync', 'watch']);

};
