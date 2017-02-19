module.exports = function(grunt) {

    /**
    * Grunt configuration.
    **/
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        /**
        * Browser Sync Task
        * Watches the files and refreshes our browser window.
        * @file grunt('grunt-browser-sync');
        **/
        browserSync: {
            bsFiles: {
    			src: [
                    // Pretty much all the files in here
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
    			proxy: 'test-theme.uk', // Change the name to your MAMP name
    			ghostMode: {
    				scroll: true,
    				links: true,
    				forms: true
    			}
    		}
        },

        /**
        * Concat Task
        * Concates all of our javascript files into one main file, to use on the site.
        * @file grunt('grunt-contrib-concat');
        **/
        concat: {
            dist: {
                src: [
                    'assets/js/libs/**/*.js', // all js vendor files
                    'assets/js/main.js' // the main js file
                ],
                dest: 'assets/js/scripts.js', // concat it into one file
            },
        },

        /**
        * Uglify Tasks
        * Minifies the main javascript file into a minified one.
        * @file grunt('grunt-contrib-uglify');
        **/
        uglify: {
            build: {
                src: 'assets/js/scripts.js', // take our concation file from the conat task.
                dest: 'assets/js/scripts.min.js' // minify it.
            }
        },

        /**
        * Sass Task
        * Compiles our sass into css.
        * @file grunt('grunt-sass');
        **/
        sass: {
            options: {
                sourceMap: true,
                outputStyle: 'compressed' // expanded / compressed
            },
            dist: {
                files: {
                    'assets/css/style.css': 'assets/scss/style.scss' // the main style .scss file.
                }
            },
        },

        /**
        * Autoprefixer (PostCSS) Task
        * Autoprefixes our css so we don't!
        * @file grunt('grunt-postcss');
        **/
        postcss: {
          options: {
            map: true,
            processors: [
              require('autoprefixer')({
                browsers: ['last 25 versions'] // the last 25 vers of all browsers.
              })
            ]
          },
          dist: {
            src: 'assets/css/style.css' // the main output of our scss file.
          }
        },

        /**
        * Imagemin Task
        * Minifies our images and removes unwanted data.
        * @file grunt('grunt-contrib-imagemin');
        **/
        imagemin: {
            dynamic: {
              files: [{
                expand: true,
                cwd: 'assets/img/', // location of all theme imgs.
                src: ['**/*.{png,jpg,gif}'],
                dest: 'assets/img/' // replace the theme imgs with the compressed one.
              }]
            }
        },

        /**
        * Watch Task
        * Watches our main script file for changes, css and also browserSync.
        * @file grunt('grunt-contrib-watch');
        **/
        watch: {
            options: {
                dateFormat: function(time) {
                    grunt.log.writeln('Finished in ' + time + 'ms at ' + (new Date()).toString());
                    grunt.log.writeln('Waiting for more changes...');
                }
            },
            // Watch our main script
            scripts: {
                files: 'assets/js/main.js', // The main JS file for the theme.
                tasks: ['concat', 'uglify'],
            },
            // Watch main stylesheet.
            css: {
              files: 'assets/scss/**/*.scss',
              tasks: ['sass','postcss'],
            },
            // All of the files in this theme
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

        svgstore: {
          options: {
            prefix : 'icon-', // This will prefix each <g> ID
          },
          default : {
              files: {
                'assets/img/icons/svg-defs.svg': ['assets/img/icons/*.svg'],
              }
            }
        },

        // End Grunt Config
    });

    /**
    * Time Grunt
    * Time stamps the grunt tasks.
    **/
    require('time-grunt')(grunt);

    /**
    * Load the plugins.
    **/
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-svgstore');

    /**
    * Default task(s).
    **/
    grunt.registerTask('default', ['browserSync', 'watch']);

};
