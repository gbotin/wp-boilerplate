var themeDir = "./wp-content/themes/template/";

module.exports = {

  theme: themeDir,

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
