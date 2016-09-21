var dest = "./wp-content/themes/template/dist";
var src = "./wp-content/themes/template/src";

module.exports = {

  dest: dest,
  src: src,

  sourcemaps: true,
  minify: true,

  styles: {
    dest: dest + "/css",
    paths: [
      src + "/styles/**/*"
    ],
    entrypoints: [
      src + "/styles/main.scss",
      src + "/styles/editor.scss"
    ],
    includePaths: [
      "bower_components/bootstrap-sass/assets/stylesheets",
      'bower_components/font-awesome/scss'
    ]
  },

  scripts: {
    dest: dest + "/js",
    paths: [
      src + "src/scripts/**/*"
    ],
    bundles: [
      {
        files: [
          "bower_components/bootstrap-sass/assets/javascripts/bootstrap.js",
          src +"/scripts/application.js"
        ],
        dest: dest + "/js",
        output: 'bundle.js'
      },
    ]
  },

  images: {
    dest: dest + "/images",
    paths: [
      src + "/images/**/*.{jpg,jpeg,png,gif}"
    ]
  },

  fonts: {
    dest: dest + "/fonts",
    paths: [
      src + "/fonts/**/*.{eot,woff,woff2,svg,ttf}",
      "bower_components/font-awesome/fonts/**.{eot,woff,woff2,svg,ttf}"
    ]
  }

};
