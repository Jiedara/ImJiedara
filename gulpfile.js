var gulp = require("gulp");
var concat = require("gulp-concat");
var plumber = require("gulp-plumber");
var uglify = require("gulp-uglify");
var compass = require('gulp-compass');
var minifyCSS = require('gulp-clean-css');
var git = require('gulp-git');

var jsPath = "./js";
var cssPath = "./css";
var scssPath = "./scss";
var imgPath = "./img";

gulp.task('default', ['script-concat', 'watch', 'compass']);

gulp.task('script-concat', function () {

	gulp.src([jsPath + '/script.js', '!' + jsPath + '/*.min.js', '!' + jsPath + '/admin.js'])
		.pipe(plumber())
		.pipe(concat('script.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest(jsPath));
});

gulp.task('compass', function () {
	gulp.src([scssPath + '/*.scss',scssPath + '/*/*.scss','!' + scssPath + '/admin.scss'])
		.pipe(compass({
			config_file: './config.rb',
			css: cssPath,
			sass: scssPath
		}))
		.pipe(plumber())
		.pipe(minifyCSS())
		.pipe(concat('style.min.css'))
		.pipe(gulp.dest(cssPath));

	gulp.src([scssPath + '/admin.scss'])
		.pipe(compass({
			config_file: './config.rb',
			css: cssPath,
			sass: scssPath
		}))
		.pipe(plumber())
		.pipe(minifyCSS())
		.pipe(concat('admin.min.css'))
		.pipe(gulp.dest(cssPath));
});

gulp.task('watch', function () {
	gulp.watch([jsPath + "/*.js", "!" + jsPath + "/*.min.js"], ['script-concat']);
	gulp.watch([scssPath + "/*.scss",scssPath + "/*/*.scss"], ['compass']);
});