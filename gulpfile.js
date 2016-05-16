var gulp = require('gulp');
// Require the gulp sass plugin
var sass = require('gulp-sass');
// Load in browser-sync
var browserSync = require('browser-sync').create();
// Load up gulp-useref for concatenation
var useref = require('gulp-useref');
// Load javascript minification
var uglify = require('gulp-uglify');
// Load css minification
var cssnano = require('gulp-cssnano');
// Load gulp if for in gulp if statements
var gulpIf = require('gulp-if');
// Load image minimalizer
var imagemin = require('gulp-imagemin');
// Load a cache for minimized images
var cache = require('gulp-cache');
// Load in the cleaner
var del = require('del');
// Set up for php use
var connect = require('gulp-connect-php');
// Set up bower
var bower = require('gulp-bower');

//Set up some file path configs
var config = {
  bowerDir: './bower_components'
}

// Easy install of bowers components
gulp.task('bower', function() {
  return bower()
    .pipe(gulp.dest(config.bowerDir));
});

// moveFonts
gulp.task('setup', ['moveFAIcons', 'moveBSFonts', 'sass', 'BSJS', 'JQJS'], function() {});

// Move fontawesome icons to fonts folder
gulp.task('moveFAIcons', function() {
  return gulp.src(config.bowerDir + '/font-awesome/fonts/**.*')
    .pipe(gulp.dest('app/fonts'));
});

// Move bootstrap fonts to fonts folder
gulp.task('moveBSFonts', function() {
  return gulp.src(config.bowerDir + '/bootstrap-sass/assets/fonts/bootstrap/**.*')
    .pipe(gulp.dest('app/fonts'));
});

// Connect to php server
gulp.task('connect', function() {
  connect.server({
    base: 'app',
    port: 8010,
    keepalive: true
  })
});

gulp.task('sass', function() {
  return gulp.src(['app/scss/**/*.scss', 'bower_components/font-awesome/scss/font-awesome.scss']) // Get all the files ending in scss
    .pipe(sass()) // This calls gulp-sass
    .on('error', onError)
    .pipe(gulp.dest('app/css'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

// Gulp watch
gulp.task('watch', ['browserSync', 'sass'], function() {
  gulp.watch('app/scss/**/*.scss', ['sass']);
  gulp.watch('bower_components/bootstrap-sass/assets/stylesheets/bootstrap/*.scss', ['sass']);
  gulp.watch('bower_components/font-awesome/scss/*.scss', ['sass']);
  gulp.watch('app/js/**/*.js', browserSync.reload);
  gulp.watch('app/*.html', browserSync.reload);
  gulp.watch('app/**/*.php', browserSync.reload);
});

// Set up browser-sync
gulp.task('browserSync', ['connect'], function() {
  browserSync.init({
    proxy: '127.0.0.1:8010',
    port: 8080,
    open: true,
    notify: false
  })
});

// gulp concatenation and minification task
gulp.task('useref', function(){
  return gulp.src('app/**/*.php')
    .pipe(useref())
    // Minify only if it's javascript
    .pipe(gulpIf('*.js', uglify()))
    .on('error', onError)
    // Minify only if it's css
    .pipe(gulpIf('*.css', cssnano()))
    .on('error', onError)
    .pipe(gulp.dest('dist'))
});

// Move jquery javascript to js folder
gulp.task('JQJS', function() {
  return gulp.src('bower_components/jquery/dist/jquery.js')
    .pipe(gulp.dest('app/js'))
});

// Move bootstrap javascript to js folder
gulp.task('BSJS', function() {
  return gulp.src('bower_components/bootstrap-sass/assets/javascripts/bootstrap.js')
    .pipe(gulp.dest('app/js'))
});

// minimize images
gulp.task('images', function() {
  return gulp.src('app/images/**/*.+(png|jpg|gif|svg)')
    .pipe(cache(imagemin()))
    .pipe(gulp.dest('dist/images'))
});

// copy fonts into dist folder
gulp.task('fonts', function() {
  return gulp.src('app/fonts/**/*')
    .pipe(gulp.dest('dist/fonts'))
});

// copy partials into dist folder
gulp.task('php', function() {
  return gulp.src('app/**/*.php')
    .pipe(gulp.dest('dist'))
});

gulp.task('dist', ['useref', 'images', 'fonts', 'php'], function() {});

// Empty the dist folder
gulp.task('clean:dist', function() {
  return del.sync('dist');
});

// Clear the cache if needed
gulp.task('cache:clear', function(callback) {
  return cache.clearAll(callback)
});

// Error handler
function onError(err) {
  console.log(err);
  this.emit('end');
}
