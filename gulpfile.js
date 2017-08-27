"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass");
var del = require("del");
var run = require("run-sequence");
var plumber = require("gulp-plumber");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");


gulp.task("clean", function() {
  return del("/var/www/govorunchik/wp-content/themes/kindergarten/*",{force:true});
});

gulp.task("copy", function() {
  return gulp.src([
    "fonts/**",
    "inc/**",
    "img/**",
    "languages/**",
    "layouts/**",
    "js/**",
    "template-parts/**",
    "*.php",
    "style.css",
    "rtl.css"
  ], {
    base: "."
  })
  .pipe(gulp.dest("/var/www/govorunchik/wp-content/themes/kindergarten/"));
});

gulp.task("style", function() {
  gulp.src("sass/style.scss")
    .pipe(plumber())
    .pipe(sass())
    .pipe(postcss([
      autoprefixer({browsers: [
        "last 2 versions"
      ]})
    ]))
    .pipe(gulp.dest("/var/www/govorunchik/wp-content/themes/kindergarten"))
});

gulp.task("build", function(fn) {
  run("clean",
      "copy",
      "style",
      fn);
});


