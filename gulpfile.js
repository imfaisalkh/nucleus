/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @author Faisal Khurshid (@imfaisalkh)
 * @version 1.0.0
 */

 /**
 * Load WPGulp Configuration.
 *
 * TODO: Customize your project in the wpgulp.js file.
 */
const config = require( './wpgulp.config.js' );

/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
var gulp         = require('gulp'); // Gulp of-course
var browserify   = require('browserify');
var babelify     = require('babelify');

require('dotenv').config() // import environment variables from .ev file

// CSS related plugins.
var sass                = require('gulp-sass'); // Gulp pluign for Sass compilation.
var minifycss           = require('gulp-uglifycss'); // Minifies CSS files.
var autoprefixer        = require('gulp-autoprefixer'); // Autoprefixing magic.
var sassModuleImporter  = require('sass-module-importer'); // Allows 'npm_modules' importing in sass files.
var mmq                 = require('gulp-merge-media-queries'); // Combine matching media queries into one media query definition.
var postcss             = require('gulp-postcss');
var postcssPresetEnv    = require('postcss-preset-env');


// JS related plugins.
var uglify       = require('gulp-uglify'); // Minifies JS files

// Image realted plugins.
var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to itâ€™s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify       = require('gulp-notify'); // Sends message notification to you
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var wpPot        = require('gulp-wp-pot'); // For generating the .pot file.
var sort         = require('gulp-sort'); // Recommended to prevent unnecessary changes in pot-file.
var debug 		   = require('gulp-debug');
var replace      = require('gulp-replace');
var del          = require('del');
var zip          = require('gulp-zip');
var source       = require('vinyl-source-stream');
var buffer       = require('vinyl-buffer');
const cache      = require( 'gulp-cache' ); // Cache files in stream for later use.
const plumber    = require( 'gulp-plumber' ); // Prevent pipe breaking caused by errors from gulp plugins.
const beep       = require( 'beepbeep' );
const glob       = require( 'glob' );
const es         = require( 'event-stream' );

/**
 * Custom Error Handler.
 *
 * @param Mixed err
 */
const errorHandler = r => {
	notify.onError( '\n\n❌  ===> ERROR: <%= error.message %>\n' )( r );
	beep();

	// this.emit('end');
};


/**
 * Task: `browserSync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
const browsersync = done => {
	browserSync.init({
		proxy: config.projectURL,
		open: config.browserAutoOpen,
		injectChanges: config.injectChanges,
		watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ]
	});
	done();
};

// Helper function to allow browser reload with Gulp 4.
const reload = done => {
	browserSync.reload();
	done();
};


/**
 * Task: `compileCSS`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
  gulp.task( 'compileCSS', () => {
    return gulp
      .src( config.styleSRC, { allowEmpty: true })
      .pipe( plumber( errorHandler ) )
      .pipe( sourcemaps.init() )
      .pipe(
        sass({
          errLogToConsole: config.errLogToConsole,
          outputStyle: config.outputStyle,
          precision: config.precision,
          importer: sassModuleImporter()
        })
      )
      .on( 'error', sass.logError )
      .pipe( sourcemaps.write({ includeContent: false }) )
      .pipe( sourcemaps.init({ loadMaps: true }) )
      .pipe( autoprefixer( config.BROWSERS_LIST ) )
      .pipe( sourcemaps.write( './' ) )
      .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
      .pipe( gulp.dest( config.styleDestination ) )
      .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files.
      .pipe( mmq({ log: true }) ) // Merge Media Queries only for .min.css version.
      .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.
      .pipe( rename({ suffix: '.min' }) )
      .pipe( minifycss({ maxLineLen: 10 }) )
      .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
      .pipe( gulp.dest( config.styleDestination ) )
      .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files.
      .pipe( browserSync.stream() ); // Reloads style.min.css if that is enqueued.
      // .pipe( console.log('\n\n✅  ===> STYLES — completed!\n') );
      // .pipe( notify({ message: '\n\n✅  ===> STYLES — completed!\n', onLast: true }) );
  });

 /**
  * Task: `compileJS`.
  *
  * Concatenate and uglify custom JS scripts.
  *
  * This task does the following:
  *     1. Gets the source folder for JS custom files
  *     2. Concatenates all the files and generates custom.js
  *     3. Renames the JS file with suffix .min.js
  *     4. Uglifes/Minifies the JS file and generates custom.min.js
  */
  gulp.task('compileJS', function(done) {
    var tasks = config.JS_ENTRY_POINTS.map(function(entry) {
        console.log('Working on File:', entry);
        return browserify({ entries: [entry] })
            .transform( babelify ) // Transpiles all ES6 JS to ES5 JS code.
            .transform( { global: true }, 'browserify-shim' ) // Transpiles all ES6 JS to ES5 JS code.
            .bundle()
            .pipe( source(entry) )
            .pipe( buffer() )
            .pipe( rename(function (path) {
              var temp = path.dirname.slice(0, -2);
              path.dirname = temp + "js";
              path.extname = ".min.js";
            }) )
            .pipe( uglify() )
            .pipe( gulp.dest('.') );
            // .pipe( console.log('\n\n✅  ===> SCRIPTS — completed!\n') );
            // .pipe( notify({ message: '\n\n✅  ===> SCRIPTS — completed!\n', onLast: true }) );
        });
    done();
  });


 /**
  * Task: `optimizeImgs`.
  *
  * Minifies PNG, JPEG, GIF and SVG images.
  *
  * This task does the following:
  *     1. Gets the source of images src folder
  *     2. Minifies PNG, JPEG, GIF and SVG images
  *     3. Generates and saves the optimized images
  *
  * This task will run only once, if you want to run it
  * again, do it with the command `gulp images`.
  */
  gulp.task( 'optimizeImgs', () => {
    return gulp
      .src( config.imagesSRC )
      .pipe(
        cache(
          imagemin([
            // imagemin.gifsicle({ interlaced: true }),
            // imagemin.jpegtran({ progressive: true }),
            // imagemin.optipng({ optimizationLevel: 4 }), // 0-7 low-high.
            imagemin.svgo({
              plugins: [ { removeViewBox: true }, { cleanupIDs: false } ]
            })
          ])
        )
      )
      .pipe( gulp.dest( config.imagesDestination ) )
      .pipe( notify({ message: '\n\n✅  ===> IMAGES — completed!\n', onLast: true }) );
  });
  
  /**
   * Task: `clear-images-cache`.
   *
   * Deletes the images cache. By running the next "images" task,
   * each image will be regenerated.
   */
  gulp.task( 'clearCache', function( done ) {
    return cache.clearAll( done );
  });


 /**
  * WP POT Translation File Generator.
  *
  * * This task does the following:
  *     1. Gets the source of all the PHP files
  *     2. Sort files in stream by path or any custom sort comparator
  *     3. Applies wpPot with the variable set at the top of this file
  *     4. Generate a .pot file of i18n that can be used for l10n to build .mo file
  */
  gulp.task( 'translate', () => {
    return gulp
      .src( config.projectPHPWatchFiles )
      .pipe( sort() )
      .pipe(
        wpPot({
          domain: config.textDomain,
          destFile: config.destFile,
          package: config.packageName,
          bugReport: config.bugReport,
          lastTranslator: config.lastTranslator,
          team: config.team
        })
      )
      .pipe( gulp.dest( config.translationDestination ) )
      .pipe( notify({ message: '\n\n✅  ===> TRANSLATE — completed!\n', onLast: true }) );
  });


/**
  * Task: `build`.
  *
  * Build the final package with theme ZIP file + documentation.
  *
  * This task and it's dependant tasks does the following in order:
  *     1. Removes the different folders and files within './.dist/' before re-building
  *     2. Copy production theme files to './.dist/main-files/theme/<project-name>' folder
  *     3. Creates a ZIP file of the copied theme files at path './.dist/main-files/theme/<project-name>.zip'
  *     4. Creates a final build folder named 'main-files.zip' in './.dist/'. Ready to be uplaoded!
  *
  */

 gulp.task('clean', del.bind(null, config.buildClean));

 gulp.task( 'copy', function() {
  var stream = gulp.src( config.buildThemeSRC )
    .pipe( gulp.dest( config.buildThemeDestination + config.project ) );
    return stream;
 });

 gulp.task( 'compress', function() {
  var stream = gulp.src( config.buildThemeDestination + config.project + '/**/*', {base: config.buildThemeDestination} )
    .pipe( zip( config.project + '.zip' ) )
    .pipe( gulp.dest( config.buildThemeDestination ) );
    return stream;
 });

 gulp.task( 'build', gulp.series('clean', 'copy', 'compress'), function() {
  var stream = gulp.src( config.buildFinalSRC + '/**/*', {base: config.buildFinalDestination} )
    .pipe( zip( 'main-files.zip' ) )
    .pipe( gulp.dest( config.buildFinalDestination ) )
    .pipe( notify( { message: 'TASK: "build" Completed! ðŸ’¯', onLast: true } ) );
    return stream;
 });


 /**
  * Watch Tasks.
  *
  * Watches for file changes and runs specific tasks.
  */

gulp.task(
	'default',
	gulp.parallel( 'compileCSS', 'compileJS', 'optimizeImgs', browsersync, () => {
		gulp.watch( config.projectPHPWatchFiles, reload ); // Reload on PHP file changes.
		gulp.watch( config.compileCSSWatchFiles, gulp.parallel( 'compileCSS' ) ); // Reload on SCSS file changes.
		gulp.watch( config.JS_ENTRY_POINTS, gulp.series( 'compileJS', reload ) ); // Reload on customJS file changes.
		gulp.watch( config.imagesSRC, gulp.series( 'optimizeImgs', reload ) ); // Reload on customJS file changes.
	})
);