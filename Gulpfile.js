var gulp          = require('gulp');
var sass          = require('gulp-sass');
var rename        = require('gulp-rename');
var browserify    = require('browserify');
var babelify      = require('babelify');
var watchify      = require('watchify');
var source        = require('vinyl-source-stream');
var buffer        = require('vinyl-buffer');
var through2      = require('through2');
var es            = require('event-stream');
var livereload    = require('gulp-livereload');
var imagemin      = require('gulp-imagemin');
var autoprefixer  = require('gulp-autoprefixer');

var themeDir = "wp-content/themes/template/";

var config = {

  sass: {
    dest: themeDir + "dist/css/",
    sources: [
      themeDir + "src/sass/main.sass"
    ],
    includePaths: [
      "bower_components/bootstrap-sass/assets/stylesheets",
      'bower_components/font-awesome/scss'
    ]
  },

  js: {
    dest: themeDir + "dist/js/",
    sources: [
      themeDir + "src/scripts/application.es6",
    ],
    includePaths: [
      "bower_components/jquery/dist",
      "bower_components/bootstrap-sass/assets/javascripts",
    ]
  },

  images: {
    dest: themeDir + "dist/images/",
    sources: [
      themeDir + "src/images/**/*.{jpg,jpeg,png,gif}"
    ]
  },

  fonts: {
    dest: themeDir + "dist/fonts/",
    sources: [
      themeDir + "src/fonts/**/*.{eot,woff,woff2,svg,ttf}",
      "bower_components/font-awesome/fonts/**.{eot,woff,woff2,svg,ttf}"
    ]
  }

};


var bundle = function (opts) {

  var rebundle = function (bundler, stream, next) {

    bundler
      .transform(babelify, {
        presets: ["es2015"],
        extensions: [".es6"]
      });

    bundler.bundle(function (err, res) {
      if (err) {
        console.log(err);

        if (next)
          return next(err) ;

        return err;
      }

      stream.contents = res;

      stream
        .pipe(source(stream.relative))
        .pipe(buffer())
        .pipe(rename({extname: '.js'}))
        .pipe(gulp.dest(config.js.dest))
        .pipe(livereload());

      if (next)
        return next(null, stream);
    });
  };

  bundlers = through2.obj(function (stream, enc, next) {
    b = browserify(stream.path, {
      debug: true,
      paths: config.js.includePaths,
      cache: {},
      packageCache: {}
    });

    if (opts.watch)
      watchify(b);

    b.on('update', function () {
      rebundle(b, stream, null);
    });

    rebundle(b, stream, next);
  });

  gulp.src(config.js.sources)
    .pipe(bundlers);
};

gulp.task("scripts", function () {
  bundle({watch: false});
});

gulp.task("sass", function () {
  gulp.src(config.sass.sources)
    .pipe(
      sass({
        outputStyle: 'nested',
        includePaths: config.sass.includePaths,
      }).on('error', sass.logError))
    .pipe(autoprefixer({
      browsers: [
        'last 2 versions',
        'ie 8',
        'ie 9',
        'android 2.3',
        'android 4',
        'opera 12'
      ]}))
    .pipe(gulp.dest(config.sass.dest))
    .pipe(livereload());
});

gulp.task("images", function(){
  gulp.src(config.images.sources)
  .pipe(imagemin())
  .pipe(gulp.dest(config.images.dest))
  .pipe(livereload());
});

gulp.task("fonts", function(){
  gulp.src(config.fonts.sources)
  .pipe(gulp.dest(config.fonts.dest))
  .pipe(livereload());
});

gulp.task("watch", function () {
  livereload.listen();

  gulp.watch(themeDir + "/src/images/**/*.{sass,scss}", ["sass"]);
  gulp.watch(config.images.sources, ["images"]);
  gulp.watch(config.images.fonts, ["fonts"]);
  
  bundle({watch: true});
});

gulp.task("build", ["sass", "scripts", "fonts", "images"]);

gulp.task("default", ["build", "watch"]);
