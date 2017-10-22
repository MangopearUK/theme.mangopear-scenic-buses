/**
 * Register custom post type for Hildon website: Frequently asked questions (for the general website) [faqs]
 *
 * This post type holds the FAQs for general website use, they appear on the help page.
 *
 * @category 	Compilation
 * @package  	hildon
 * @author  	Andi North <andi@mangopear.co.uk>
 * @copyright  	2015 Mangopear creative
 * @license   	GNU General Public License <http://opensource.org/licenses/gpl-license.php>
 * @version  	1.0.0
 * @link 		https://mangopear.co.uk/account/clients/hildon/docs/themes/hildon/
 * @since   	1.0.0
 */


/**
 * Contents
 *
 * [1]	Load plugins
 * [2]	Styles
 * [3]	Plugins
 * [4]	Scripts
 * [5]	Images
 * [6]	Watch
 * [7]	Task
 */


	/**
 	 * [1]	Load plugins
 	 */
	 
	var gulp = require('gulp'),
	 	plugins = require('gulp-load-plugins')({ camelize: true }),
		lr = require('tiny-lr'),
		server = lr();


	/**
	 * [2]	Styles
	 */
	
	gulp.task('styles', function() {
		return gulp.src('resources/css/sass/*.scss')
			.pipe(plugins.rubySass({ style: 'expanded', sourcemap: true }))
			.pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
			.pipe(gulp.dest('resources/css/compiled'))
	//		.pipe(plugins.minifyCss({ keepSpecialComments: 1 }))
			.pipe(gulp.dest('resources/css/compiled'))
			.pipe(plugins.notify({ message: 'Your SCSS files have been processed and minified, ready for deployment.' }));
	});


	/**
	 * [3]	Plugins
	 */
	
	gulp.task('plugins', function() {
		return gulp.src(['resources/js/source/plugins.js', 'resources/js/vendor/*.js'])
			.pipe(plugins.concat('plugins.js'))
			.pipe(gulp.dest('resources/js/compiled'))
			.pipe(plugins.rename({ suffix: '.min' }))
			.pipe(plugins.uglify())
			.pipe(gulp.dest('resources/js/compiled'))
			.pipe(plugins.notify({ message: 'Your JavaScript plugin files have been processed, ready for deployment.' }));
	});


	/**
	 * [4]	Scripts
	 */
	
	gulp.task('scripts', function() {
		return gulp.src(['!resources/js/source/plugins.js', 'resources/js/source/*.js'])
			.pipe(plugins.jshint('.jshintrc'))
			.pipe(plugins.jshint.reporter('default'))
			.pipe(plugins.concat('global.js'))
			.pipe(gulp.dest('resources/js/compiled'))
			.pipe(plugins.rename({ suffix: '.min' }))
			.pipe(plugins.uglify())
			.pipe(gulp.dest('resources/js/compiled'))
			.pipe(plugins.notify({ message: 'Your JavaScript source files have been processed, ready for deployment.' }));
	});


	/**
	 * [5]	Images
	 */
	
	gulp.task('images', function() {
		return gulp.src('resources/images/**/*', '!resources/images/**/*.psd')
			.pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })))
			.pipe(gulp.dest('resources/images'))
			.pipe(plugins.notify({ message: 'Your images have been minified, ready for deployment.' }));
	});


	/**
	 * [6]	Watch
	 *
	 * 		[a]	Watch on port 35729
	 * 		[b]	Watch .scss files
	 * 		[c]	Watch .js files
	 * 		[d]	Watch image files
	 */
	
	gulp.task('watch', function() {
		gulp.watch('resources/css/sass/**/*.scss', ['styles']); // [b]
		gulp.watch('resources/js/plugins/*.js', ['plugins']); // [c]
		gulp.watch('resources/js/source/*.js', ['scripts']); // [c]
		gulp.watch('resources/images/**/*', ['images']); // [d]
	});


	/**
	 * [7]	Task
	 */
	
	gulp.task('default', ['styles', 'plugins', 'scripts', 'watch']);
