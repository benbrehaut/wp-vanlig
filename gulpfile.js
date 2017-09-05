/**
 * @function gulp
 * @description the main gulp file for the task runner
 * @version v1
 */
var gulp = require('gulp');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var concat = require('gulp-concat');
var imagemin = require('gulp-imagemin');
var prefix = require('gulp-autoprefixer');
var svgstore = require('gulp-svgstore');
var sourcemaps = require('gulp-sourcemaps');

/**
 * @function variables
 * @description variables which contain things used throughout this file
 */

// Site URL for Browser Sync
var siteURL                = 'test-theme.uk';

// Main JS Variables
var jsFiles                = 'assets/js/vendor/**/*.js';
var mainJSFile             = 'assets/js/scripts.js';
var outputJSFile           = 'main.js';
var outputJSFileCompressed = 'main.min.js';
var outputJSFileLocation   = 'assets/js/dist';

// Main Sass / CSS files
var sassFiles                = 'assets/scss/**/*.scss';
var mainSassFile             = 'assets/scss/style.scss';
var outputCSSFile            = 'main.css';
var outputCSSFileCompressed  = 'main.min.css';
var outputCSSFileLocation    = 'assets/css/dist';

// Autoprefixer
var autoprefixerOptions = {
  browsers: ['last 25 versions']
};


/**
 * @function scripts
 * @description pipes our vendor JS files, main JS file out and minifies it
 * @version v1
 */
gulp.task('scripts', function () {
  return gulp.src([jsFiles, mainJSFile])
    .pipe(plumber())
    .pipe(concat(outputJSFile))  // output main JavaScript file without uglify
    .pipe(gulp.dest(outputJSFileLocation))
    .pipe(uglify())
    .pipe(concat(outputJSFileCompressed)) // output main JavaScript file w/ uglify
    .pipe(gulp.dest(outputJSFileLocation))
    .pipe(browserSync.reload({ stream: true }))
});

/**
 * @function sass
 * @description compiles our static .scss files into one main .css file
 * @version v1
 */
gulp.task('styles', function () {
  return gulp.src(mainSassFile)
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: ['scss'],
      onError: browserSync.notify
    }).on('error', sass.logError))
    .pipe(prefix(autoprefixerOptions, { cascade: true }))
    .pipe(plumber())
    .pipe(concat(outputCSSFile)) // output main CSS file without cleanCSS
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest(outputCSSFileLocation))
    .pipe(cleanCSS())
    .pipe(concat(outputCSSFileCompressed)) // output main CSS file w/ cleanCSS
    .pipe(gulp.dest(outputCSSFileLocation))
    .pipe(browserSync.reload({ stream: true }));
});

/**
 * @function browser-sync
 * @description generates BrowserSync for watching and refreshing page
 * @version v1
 */
gulp.task('browser-sync', ['scripts', 'styles'], function () {
  browserSync.init({
    proxy: siteURL,
    files: [
      "*.php",
      '**/*.php',
      '*.twig',
      '**/*.twig',
      'gulpfile.js',
      outputJSFileLocation + '/*.js',
      outputCSSFileLocation + '/*.css'
    ]
  });
});

/**
 * @function imgs
 * @description compresses static images
 * @version v1
 */
gulp.task('imgs', function () {
  gulp.src('assets/imgs/*')
    .pipe(imagemin())
    .pipe(gulp.dest('assets/imgs'));
});

/**
 * @function svgstore
 * @description generates and creates svg icons using #symbol
 * @version v1
 */
gulp.task('svgstore', function () {
  return gulp.src('assets/icons/*.svg')
    .pipe(svgstore())
    .pipe(gulp.dest('assets/icons'));
});

/**
 * @function watch
 * @description watchs the .js and .scss files for changes
 * @version v1
 */
gulp.task('watch', function () {
  gulp.watch(mainJSFile, ['scripts']);
  gulp.watch(sassFiles, ['styles']);
});

/**
 * @function default
 * @description runs the default task, which is browser sync and watch tasks
 * @version v1
 */
gulp.task('default', ['browser-sync', 'watch']);