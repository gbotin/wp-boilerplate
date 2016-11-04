var gulp          = require('gulp');
var imagemin      = require('gulp-imagemin');
var gutil         = require('gulp-util');
var sourcemaps    = require('gulp-sourcemaps');
var uglify        = require('gulp-uglify');
var livereload    = require('gulp-livereload');
var sass          = require('gulp-sass');
var gulpif        = require('gulp-if');
var plumber       = require('gulp-plumber');
var sequence      = require('gulp-sequence');
var cssmin        = require('gulp-cssmin');
var autoprefixer  = require('gulp-autoprefixer');
var scsslint      = require('gulp-scss-lint');
var sasslint      = require('gulp-sass-lint');
var jshint        = require('gulp-jshint');
var del           = require('del');
var babelify      = require('babelify');
var browserify    = require('browserify');
var lazypipe      = require('lazypipe');
var watchify      = require('watchify');
var buffer        = require('vinyl-buffer');
var source        = require('vinyl-source-stream');
var rename        = require('gulp-rename');
var _             = require('underscore');
var concat        = require('gulp-concat');
var es            = require('event-stream');

var config = require('./gulp.config');

// Clear build directory
gulp.task("clean", function () {
  return del(config.dest);
});

gulp.task("compile:styles", function () {
  gulp.src(config.styles.entrypoints)
    .pipe(plumber())
    .pipe(gulpif(config.sourcemaps, sourcemaps.init()))
    .pipe(gulpif('*.{scss,sass}',
      sass.sync({
        includePaths: config.styles.includePaths
      }).on('error', sass.logError)
    ))
    .pipe(autoprefixer({
      browsers: [
        'last 2 versions',
        'android 4',
        'opera 12'
      ]}
    ))
    .pipe(gulpif(config.minify, cssmin()))
    .pipe(gulpif(config.minify, rename({suffix: '.min'})))
    .pipe(gulpif(config.sourcemaps, sourcemaps.write('.')))
    .pipe(gulp.dest(config.styles.dest))
    .pipe(livereload());
});

gulp.task("compile:scripts", function () {
  var streams = [];

  _.each(config.scripts.bundles, function(bundle) {
    var stream = gulp.src(bundle.files)
      .pipe(plumber())
      .pipe(gulpif(config.sourcemaps, sourcemaps.init()))
      .pipe(gulpif(config.minify, uglify()))
      .pipe(concat(bundle.output))
      .pipe(gulpif(config.minify, rename({suffix: '.min'})))
      .pipe(gulpif(config.sourcemaps, sourcemaps.write('.')))
      .pipe(gulp.dest(bundle.dest))
      .pipe(livereload());

    streams.push(stream);
  });

  return es.merge(streams);
});

// Minify images and copy to build directory
gulp.task("copy:images", function () {
  return gulp.src(config.images.paths)
    .pipe(imagemin({
      progressive: true,
      interlaced: true
    }))
    .pipe(gulp.dest(config.images.dest));
});

// Copy fonts to build directory
gulp.task("copy:fonts", function () {
  return gulp.src(config.fonts.paths)
    .pipe(gulp.dest(config.fonts.dest));
});

gulp.task("lint:scripts", function() {
  var lintJs = lazypipe()
    .pipe(jshint)
    .pipe(jshint.reporter, 'jshint-stylish');

  return gulp.src(config.scripts.paths)
    .pipe(gulpif('*.{js,es6}', lintJs()))
  ;
});

// Lint styles and output to console
gulp.task("lint:styles", function () {
  var lintSass = lazypipe()
    .pipe(sasslint)
    .pipe(sasslint.format);

  var lintScss = lazypipe()
    .pipe(scsslint);

  return gulp.src(config.styles.paths)
    .pipe(gulpif('*.sass', lintSass()))
    .pipe(gulpif('*.scss', lintScss()));
});


// Watch changes and recompile
gulp.task("watch", function () {
  livereload.listen();

  gulp.watch(config.styles.paths, ["compile:styles"]);
  gulp.watch(config.scripts.paths, ["compile:scripts"]);

  gulp.watch(config.src + "/**/*", function (file) {
    livereload.changed(file.path);
  });
});

gulp.task("build", [
  "compile:scripts",
  "compile:styles",
  "copy:fonts",
  "copy:images"
]);

gulp.task("default", function(callback){
  sequence("build", "watch", callback);
});
