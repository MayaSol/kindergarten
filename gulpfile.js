"use strict";

var gulp = require("gulp");
var sass = require("gulp-sass");
var del = require("del");
var run = require("run-sequence");
var plumber = require("gulp-plumber");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var svgmin = require("gulp-svgmin");
var svgstore = require("gulp-svgstore");
var rename = require("gulp-rename");
var inject = require("gulp-inject");
var gnf = require('gulp-npm-files');

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

gulp.task("copyNpmDependenciesOnly", function() {
  gulp.src(gnf(), {base:'./'})
  .pipe(gulp.dest('/var/www/govorunchik/wp-content/themes/kindergarten/'));
});

gulp.task("svgsprite", function() {
  var sources = gulp
  .src("img/icons/*.svg")
  .pipe(svgstore({
      inlineSvg: true
    }));

  var target = gulp.src("src/inline-svg.html");

  return target.pipe(inject(
    sources,
    {
      transform: function (filePath, file) {
      // return file contents as string
      return file.contents.toString()
      }
    }))
  .pipe(rename("svg-icons.svg"))
  .pipe(gulp.dest("/var/www/govorunchik/wp-content/themes/kindergarten/img/"));
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
      "copyNpmDependenciesOnly",
      "svgsprite",
      "style",
      fn);
});


