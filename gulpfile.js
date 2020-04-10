/* Articles
	* https://gulpjs.com/docs/en/getting-started/creating-tasks/
	* https://gulpjs.com/docs/en/getting-started/working-with-files
	* https://css-tricks.com/gulp-for-beginners/
	* https://github.com/cferdinandi/gulp-boilerplate
*/


// Require these things
const {
	gulp,
	watch,
	src,
	dest,
	series,
	parallel
}                      = require('gulp');
const browserSync      = require('browser-sync').create();
const del              = require('del');
const rename           = require("gulp-rename");
const sass             = require('gulp-sass');
const sourcemaps       = require('gulp-sourcemaps');
const autoprefixer     = require('gulp-autoprefixer');
const cssnano          = require('gulp-cssnano');
const uglify           = require('gulp-uglify');
const pump             = require('pump');


// Project Variables
const projectURL       = 'itsmariosouza.local';

// const paths = {
// 	sass: {
// 		src: 'ux/scss/*.{scss,sass}',
// 		dest: 'ux/css'
// 	},
// 	scripts: {
// 		src: 'ux/js/**/*.js',
// 		dest: 'dist/scripts/'
// 	},
// 	styles: {
// 		src: 'ux/scss/*.{scss,sass}',
// 		dest: 'ux/css'
// 	}
// }; //paths.sass.src, future enhancement


// Start Local Server
function starServer(cb) {
	browserSync.init({
		proxy: projectURL,
		injectChanges: true,
		https: false,
		watchOptions: {
			debounceDelay: 500 // Introduces a small delay when watching for changes to avoid triggering too many reloads
		}
	});

	cb();
};


// Reload Local Server
function reloadServer(cb) {
	browserSync.reload();

	cb();
}


// Watch for File Changes
function watchFiles(cb) {
	// watch('ux/scss/**/*.scss', series(buildStyles, updateServer));
	watch('ux/scss/**/*.scss', buildStyles);
	watch('ux/js/**/*.js', reloadServer);
	watch('**/*.php', reloadServer);

	cb();
}


// SASS > CSS > Autoprefixer + Sourcemaps
function buildStyles(cb) {
	return src('ux/scss/*.scss') // Get all files ending with .scss and children directories

		.pipe(sourcemaps.init()) // Initiaite sourcemap

		.pipe(sass({
			outputStyle: 'expanded'
		}).on('error', sass.logError)) // Compile Sass, log errors to console

		.pipe(autoprefixer({
			overrideBrowserslist:  ['> 5%', 'last 3 versions'],
			// browsers: ['> 5%', 'last 3 versions'],
			cascade: true
		})) // Pass CSS through autoprefixer

		.pipe(sourcemaps.write('sourcemaps')) // Place sourcemap in a destination making it an external file

		.pipe(dest('ux/css')) // Output the file in the destination folder

		.pipe(browserSync.stream()); // Inject (don't reload) changes with BrowserSync

	cb();
}


// Autoprefixed CSS > Minified CSS
function minifyStyles(cb) {
	return src('ux/css/*.css') // get file

		.pipe(cssnano()) // Minify file

		.pipe(rename({
			suffix: '.min'
		})) // rename with min suffix

		.pipe(dest('ux/css')); // place file in location

	cb();
}


// JS > Minfied JS
function minifyScripts(cb) {
	pump([
		src('ux/js/main.js'),
		uglify(),
		rename({
			suffix: '.min'
		}),
		dest('ux/js')
	], cb);
}


// Clean CSS folder
function cleanCSS (cb) {
	del.sync('ux/css');

	cb();
}


// Gulp Watch
exports.watch = series (
	parallel (
		buildStyles,
		starServer
	),
	watchFiles
);


// Gulp Build
exports.build = series (
	cleanCSS,
	buildStyles,
	parallel (
		minifyStyles,
		minifyScripts
	)
);