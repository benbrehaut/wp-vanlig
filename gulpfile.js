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
var babel = require('gulp-babel');

/**
 * @function variables
 * @description variables which contain things used throughout this file
 */

// Site URL for Browser Sync
// - - - - - - - - - - - - - - - - - -
const siteURL = 'test-theme.uk';

// Main JS Variables
// - - - - - - - - - - - - - - - - - -
const js = { 
  jsFiles: './assets/js/vendor/**/*.js',
  mainJSFile: './assets/js/scripts.js',
  outputJSFile: './main.js',
  outputJSFileCompressed: './main.min.js',
  outputJSFileLocation: './assets/js/dist',
};

// Main CSS Variables
// - - - - - - - - - - - - - - - - - -
const css = {
  sassFiles: './assets/scss/**/*.scss',
  mainSassFile: './assets/scss/style.scss',
  outputCSSFile: './main.css',
  outputCSSFileCompressed: './main.min.css',
  outputCSSFileLocation: './assets/css/dist'
};

// Autoprefixer Variables
// - - - - - - - - - - - - - - - - - -
const autoprefixerOptions = {
  browsers: ['last 25 versions']
};

// Media Variables
// - - - - - - - - - - - - - - - - - -
const media = {
  imgs: 'assets/imgs',
  icons: 'assets/icons'
}

/**
 * @function scripts
 * @description pipes our vendor JS files, main JS file out and minifies it
 * @version v1
 */
gulp.task('scripts', function () {
  return gulp.src([js.jsFiles, js.mainJSFile])
    .pipe(babel({
      presets: ['env']
    }))
    .pipe(plumber())
    .pipe(concat(js.outputJSFile))  // output main JavaScript file without uglify
    .pipe(gulp.dest(js.outputJSFileLocation))
    .pipe(uglify())
    .pipe(concat(js.outputJSFileCompressed)) // output main JavaScript file w/ uglify
    .pipe(gulp.dest(js.outputJSFileLocation))
    .pipe(browserSync.reload({ stream: true }))
});

/**
 * @function sass
 * @description compiles our static .scss files into one main .css file
 * @version v1
 */
gulp.task('styles', function () {
  return gulp.src(css.mainSassFile)
    .pipe(sourcemaps.init())
    .pipe(sass({
      includePaths: ['scss'],
      onError: browserSync.notify
    }).on('error', sass.logError))
    .pipe(prefix(autoprefixerOptions, { cascade: true }))
    .pipe(plumber())
    .pipe(concat(css.outputCSSFile)) // output main CSS file without cleanCSS
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest(css.outputCSSFileLocation))
    .pipe(cleanCSS())
    .pipe(concat(css.outputCSSFileCompressed)) // output main CSS file w/ cleanCSS
    .pipe(gulp.dest(css.outputCSSFileLocation))
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
      js.outputJSFileLocation + '/*.js',
      css.outputCSSFileLocation + '/*.css'
    ]
  });
});

/**
 * @function imgs
 * @description compresses static images
 * @version v1
 */
gulp.task('imgs', function () {
  gulp.src(media.imgs + '/*')
    .pipe(imagemin())
    .pipe(gulp.dest(media.imgs));
});

/**
 * @function svgstore
 * @description generates and creates svg icons using #symbol
 * @version v1
 */
gulp.task('svgstore', function () {
  return gulp.src(media.icons + '/*.svg')
    .pipe(svgstore())
    .pipe(gulp.dest(media.icons));
});

/**
 * @function watch
 * @description watchs the .js and .scss files for changes
 * @version v1
 */
gulp.task('watch', function () {
  gulp.watch(js.mainJSFile, ['scripts']);
  gulp.watch(css.sassFiles, ['styles']);
});

/**
 * @function default
 * @description runs the default task, which is browser sync and watch tasks
 * @version v1
 */
gulp.task('default', ['browser-sync', 'watch']);