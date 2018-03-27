// Require these things
var gulp             = require('gulp');
var sass             = require('gulp-sass');
var browserSync      = require('browser-sync').create();
var uglify           = require('gulp-uglify');
var cssnano          = require('gulp-cssnano');
var runSequence      = require('run-sequence');
var autoprefixer     = require('gulp-autoprefixer');
var rename           = require("gulp-rename");
var sourcemaps       = require('gulp-sourcemaps');
var del              = require('del');
var injectPartials   = require('gulp-inject-partials');


// Switch paths depending on /front-end vs. /themes
var srcDirectory = 'front-end';
var thmDirectory = 'theme';


//  Start BrowserSync server, reloads browser when definied items change
gulp.task('browserSync', function() {
	browserSync.init({
		server: {
			baseDir: 'front-end'
		},
	})
});


// SASS > CSS > Autoprefixer
gulp.task('sass', function() {
	return gulp.src(srcDirectory + '/ux/scss/*.scss') // Get all files ending with .scss in app/scss and children directories

	.pipe(sourcemaps.init()) // Initiaite SCSS sourcemap

	.pipe(sass({
		outputStyle: 'expanded'
	}).on('error', sass.logError)) // Pass through a gulp-sass, log errors to console

	.pipe(autoprefixer({
		browsers: ['> 5%', 'last 3 versions'],
		cascade: true
	})) // Pass through autoprefixer

	.pipe(sourcemaps.write('/sourcemaps')) // Place sourcemap in a destination making it an external file

	.pipe(gulp.dest(srcDirectory + '/ux/css')) // Output the file in the destination folder

	.pipe(browserSync.reload({
		stream: true
	})) // Reload the browser with BrowserSync
});


// Partials + Templates > Rendered Pages
gulp.task('partials', function() {
	return gulp.src('./' + srcDirectory +'/templates/*.html') // get all html template files

	.pipe(injectPartials({
		removeTags: false
	})) // inject the partials into the templates

	.pipe(gulp.dest('./' + srcDirectory)) // place the rendered page files into the correct directory

	.pipe(browserSync.reload({
		stream: true
	})) // Reload the browser
});


// Watchers
gulp.task('watchers', function() {
	gulp.watch(srcDirectory + '/ux/scss/**/*.scss', ['sass']);
	gulp.watch(srcDirectory + '/templates/**/*.html', ['partials']);
	gulp.watch(srcDirectory + '/ux/js/**/*.js', browserSync.reload);
});


// Autoprefixed CSS > Minified CSS
gulp.task('minify-css', function() {
	return gulp.src(srcDirectory + '/ux/css/*.css') // get file

	.pipe(cssnano()) // minify file

	.pipe(rename({
		suffix: '.min'
	})) // rename with min suffix

	.pipe(gulp.dest(thmDirectory + '/ux/css')); // place file in location
});


// JS > Minfied JS
gulp.task('minify-js', function () {
	return gulp.src(srcDirectory + '/ux/js/main.js') // get file

	.pipe(uglify()) // minify file

	.pipe(rename({
		suffix: '.min'
	})) // rename with min suffix

	.pipe(gulp.dest(thmDirectory + '/ux/js')) // place file in location
});


gulp.task('clean:srcCSS', function() {
	return del.sync(srcDirectory + '/ux/css');
});


gulp.task('clean:thmUX', function() {
	return del.sync(thmDirectory + '/ux');
});


// Copying UX Folder
gulp.task('copy-ux', function() {
	return gulp.src(srcDirectory + '/ux/**/*')
	.pipe(gulp.dest(thmDirectory + '/ux'))
})


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
		['clean:srcCSS', 'clean:thmUX'],
		'partials',
		'sass',
		'copy-ux',
		['minify-css', 'minify-js'],
		callback
	)
});
