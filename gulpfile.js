// Require these things
var gulp             = require('gulp');
var sass             = require('gulp-sass');
var browserSync      = require('browser-sync').create();
var uglify           = require('gulp-uglify');
var pump             = require('pump');
// var pipeline         = require('readable-stream').pipeline;
var cssnano          = require('gulp-cssnano');
var runSequence      = require('run-sequence');
var autoprefixer     = require('gulp-autoprefixer');
var rename           = require("gulp-rename");
var sourcemaps       = require('gulp-sourcemaps');
var del              = require('del');


// Project Variables
var projectURL       = 'itsmariosouza.local';


//  Start BrowserSync server, reloads browser when definied items change
gulp.task( 'browserSync', function() {
	browserSync.init({
		proxy: projectURL,
		injectChanges: true,
		https: false,
		watchOptions: {
			debounceDelay: 500 // Introduces a small delay when watching for changes to avoid triggering too many reloads
		}
	});
});


// SASS > CSS > Autoprefixer
gulp.task('sass', function() {
	return gulp.src('ux/scss/*.scss') // Get all files ending with .scss in app/scss and children directories

	.pipe(sourcemaps.init()) // Initiaite SCSS sourcemap

	.pipe(sass({
		outputStyle: 'expanded'
	}).on('error', sass.logError)) // Pass through a gulp-sass, log errors to console

	.pipe(autoprefixer({
		browsers: ['> 5%', 'last 3 versions'],
		cascade: true
	})) // Pass through autoprefixer

	.pipe(sourcemaps.write('sourcemaps')) // Place sourcemap in a destination making it an external file

	.pipe(gulp.dest('ux/css')) // Output the file in the destination folder

	.pipe(browserSync.reload({
		stream: true
	})) // Reload the browser with BrowserSync
});


// Watchers
gulp.task('watchers', function() {
	gulp.watch('ux/scss/**/*.scss', ['sass']);
	gulp.watch('ux/js/**/*.js', browserSync.reload);
	gulp.watch('**.php ', browserSync.reload);
});


// Autoprefixed CSS > Minified CSS
gulp.task('minify-css', function() {
	return gulp.src('ux/css/*.css') // get file

	.pipe(cssnano()) // minify file

	.pipe(rename({
		suffix: '.min'
	})) // rename with min suffix

	.pipe(gulp.dest('ux/css')); // place file in location
});


// JS > Minfied JS
gulp.task('minify-js', function(callback) {
	pump([
		gulp.src('ux/js/main.js'),
		uglify(),
		rename({
			suffix: '.min'
		}),
		gulp.dest('ux/js')
	], callback);
});

// gulp.task('minify-js', function() {
// 	return pipeline(
// 		gulp.src('ux/js/main.js'),
// 		uglify(),
// 		rename({
// 			suffix: '.min'
// 		}),
// 		gulp.dest('ux/js')
// 	);
// });


// Clean CSS folder
gulp.task('clean:css', function() {
	return del.sync('ux/css');
});


// Gulp Watch
gulp.task('watch', function(callback) {
	runSequence(
		['sass', 'browserSync'],
		'watchers',
		callback
	)
});


// Gulp Build
gulp.task('build', function(callback) {
	runSequence(
		'clean:css',
		'sass',
		['minify-css', 'minify-js'],
		callback
	)
});