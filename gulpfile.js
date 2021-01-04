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
 * Configuration.
 *
 * Project Configuration for gulp tasks.
 *
 * In paths you can add <<glob or array of globs>>. Edit the variables as per your project requirements.
 */

// START Editing Project Variables.
// Project related.
var project                 = 'nucleus'; // Project Name.
var projectURL              = 'http://localhost/wordpress/nucleus/'; // Project URL. Could be something like localhost:8888.

// Translation related.
var text_domain             = 'nucleus'; // Your textdomain here.
var destFile                = 'nucleus.pot'; // Name of the transalation file.
var packageName             = 'nucleus'; // Package name.
var bugReport               = 'imfaisalkh@gmail.com'; // Where can users report bugs.
var lastTranslator          = 'Faisal Khurshid <imfaisalkh@gmail.com>'; // Last translator Email ID.
var team                    = 'wpscouts <wpscouts.hq@gmail.com>'; // Team's Email ID.
var translatePath           = './languages' // Where to save the translation files.

// Style related.
var cssCustomSRC                = './styles/scss/main.scss'; // Path to main .scss file.
var cssCustomDestination        = './styles/css/'; // Path to place the compiled CSS file.

// CSS Vendor related.
const CSS_VENDORS_PATH = [
    './node_modules/normalize.css/normalize.css',
    './node_modules/font-awesome/css/font-awesome.css',
    './node_modules/flickity/dist/flickity.css',
    './node_modules/balloon-css/balloon.css',
    './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.css',
  ];  

var cssVendorSRC             = CSS_VENDORS_PATH; // Path to JS vendor folder.
var cssVendorDestination     = './styles/css/'; // Path to place the compiled JS vendors file.
var cssVendorFile            = 'vendors'; // Compiled JS vendors file name.
// Default set to vendors i.e. vendors.css.


// JS Vendor related.
const JS_VENDORS_PATH = [
    './node_modules/headroom.js/dist/headroom.js',
    './node_modules/headroom.js/dist/jQuery.headroom.js',
    './node_modules/imagesloaded/imagesloaded.pkgd.js',
    './node_modules/packery/dist/packery.pkgd.js',
    './node_modules/flickity/dist/flickity.pkgd.js',
    './node_modules/infinite-scroll/dist/infinite-scroll.pkgd.js',
    './node_modules/superfish/dist/js/superfish.js',
    './node_modules/superfish/dist/js/hoverIntent.js',
    './node_modules/jquery-smooth-scroll/src/jquery.smooth-scroll.js',
    './node_modules/tendina/dist/tendina.js',
    './node_modules/jquery-slinky/dist/jquery.slinky.js',
    './node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js',
  ];

var jsVendorSRC             = JS_VENDORS_PATH; // Path to JS vendor folder.
var jsVendorDestination     = './scripts/js/'; // Path to place the compiled JS vendors file.
var jsVendorFile            = 'vendors'; // Compiled JS vendors file name.
// Default set to vendors i.e. vendors.js.

// JS Custom related.
var jsCustomSRC             = './scripts/src/*.js'; // Path to JS custom scripts folder.
var jsCustomDestination     = './scripts/js/'; // Path to place the compiled JS custom scripts file.
var jsCustomFile            = 'main'; // Compiled JS custom file name.
// Default set to main i.e. main.js.

// Images related.
var imagesSRC               = './images/src/**/*.{png,jpg,gif,svg}'; // Source folder of images which should be optimized.
var imagesDestination       = './images/'; // Destination folder of optimized images. Must be different from the imagesSRC folder.

// Build files paths.
const BUILD_INCLUDE = [
        // include common file types
        './**/*.php',
        './**/*.html',
        './**/*.css',
        './**/*.js',
        './**/*.scss',
        './**/*.pot',
        './**/*.png',
        './**/*.gif',
        './**/*.jpg',
        './**/*.jpeg',
        './**/*.xml',
        './**/*.zip',
        './**/*.json',
        './**/*.svg',
        './**/*.ttf',
        './**/*.otf',
        './**/*.eot',
        './**/*.woff',
        './**/*.woff2',
        './**/*.txt',

        // exclude files and folders
        '!./.git/**/*',
        '!./.dist/**/*',
        '!./.vendors/**/*',
        '!./node_modules/**/*',
        '!./.bowerrc',
        '!./.gitignore',
        '!./logs/**/*',
        '!./bower.json',
        '!./gulpfile.js',
        '!./package.json',
        '!./README.md'
  ];

var buildClean = ['./.dist/main-files.zip', './.dist/main-files/theme/' + project, './.dist/main-files/theme/' + project + '.zip'];

var buildThemeSRC           = BUILD_INCLUDE;
var buildThemeDestination   = './.dist/main-files/theme/';
var buildFinalSRC           = './.dist/main-files/';
var buildFinalDestination   = './.dist/';

// Watch files paths.
var customCSSWatchFiles     = './styles/scss/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var vendorCSSWatchFiles     = CSS_VENDORS_PATH; // Path to all vendor CSS files.
var vendorJSWatchFiles      = JS_VENDORS_PATH; // Path to all vendor JS files.
var customJSWatchFiles      = './scripts/src/*.js'; // Path to all custom JS files.
var projectPHPWatchFiles    = ['./**/*.php', '!./.git/**/*', '!./.dist/**/*', '!./.vendors/**/*', '!./node_modules/**/*', '!./styles/**/*', '!./scripts/**/*', '!./languages/**/*', '!./images/**/*', '!./fonts/**/*', '!./admin/plugins/lib/**/*']; // Path to all PHP files.


// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
  ];


// STOP Editing Project Variables.

/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
var gulp         = require('gulp'); // Gulp of-course
var babel        = require('gulp-babel');
var browserify   = require('browserify');

require('dotenv').config() // import environment variables from .ev file

// CSS related plugins.
var sass         = require('gulp-sass'); // Gulp pluign for Sass compilation.
var minifycss    = require('gulp-uglifycss'); // Minifies CSS files.
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic.
var mmq          = require('gulp-merge-media-queries'); // Combine matching media queries into one media query definition.

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files
var uglify       = require('gulp-uglify'); // Minifies JS files

// Image realted plugins.
var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
var fs           = require('fs');
var GulpSSH      = require('gulp-ssh');
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
var filter       = require('gulp-filter'); // Enables you to work on a subset of the original files by filtering them using globbing.
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify       = require('gulp-notify'); // Sends message notification to you
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var reload       = browserSync.reload; // For manual browser reload.
var wpPot        = require('gulp-wp-pot'); // For generating the .pot file.
var sort         = require('gulp-sort'); // Recommended to prevent unnecessary changes in pot-file.
var debug 		   = require('gulp-debug');
var replace      = require('gulp-replace');
var del          = require('del');
var zip          = require('gulp-zip');


var config = {
  host: process.env.SSH_HOST,
  port: process.env.SSH_PORT,
  username: process.env.SSH_USER,
  // passphrase: process.env.SSH_PASS,
  privateKey: fs.readFileSync(process.env.SSH_KEY_PATH)
}


var gulpSSH = new GulpSSH({
  ignoreErrors: false,
  sshConfig: config
})



/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task( 'browser-sync', function() {
  browserSync.init( {

    // For more options
    // @link http://www.browsersync.io/docs/options/

    // Project URL.
    proxy: projectURL,

    browser: "opera",

    // `true` Automatically open the browser with BrowserSync live server.
    // `false` Stop the browser from automatically opening.
    open: true,

    // Inject CSS changes.
    // Commnet it to reload browser for every CSS change.
    injectChanges: true,

    // Use a specific port (instead of the one auto-detected by Browsersync).
    // port: 7000,

  } );
});


/**
 * Task: `customCSS`.
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
 gulp.task('customCSS', function () {
    gulp.src( cssCustomSRC )
    // .pipe( sourcemaps.init() )
    .pipe( sass( {
      errLogToConsole: true,
      outputStyle: 'compact',
      //outputStyle: 'compressed',
      // outputStyle: 'nested',
      // outputStyle: 'expanded',
      precision: 10
    } ) )
    .on('error', console.error.bind(console))
    // .pipe( sourcemaps.write( { includeContent: false } ) )
    // .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

    // .pipe( sourcemaps.write ( '.' ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( cssCustomDestination ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

    .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

    .pipe( rename( { suffix: '.min' } ) )
    .pipe( minifycss( {
      maxLineLen: 10
    }))
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( cssCustomDestination ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( browserSync.stream() )// Reloads style.min.css if that is enqueued.
    // .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
 });

 /**
  * Task: `vendorsCss`.
  *
  * Concatenate and uglify vendor CSS styles.
  *
  * This task does the following:
  *     1. Gets the source folder for CSS vendor files
  *     2. Concatenates all the files and generates vendors.css
  *     3. Renames the CSS file with suffix .min.css
  *     4. Uglifes/Minifies the CSS file and generates vendors.min.css
  */
 gulp.task( 'vendorsCss', function() {
  gulp.src( cssVendorSRC )
  	// .pipe(debug({title: 'unicorn:'}))
    .pipe( concat( cssVendorFile + '.css' ) )
    .pipe( replace('../fonts/', '../../fonts/') )
    .pipe( replace('../images/', '../../images/') )
    .pipe( replace('../img/', '../../images/') )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( cssVendorDestination ) )
    .pipe( rename( {
      basename: cssVendorFile,
      suffix: '.min'
    }))
    .pipe( minifycss( {
      maxLineLen: 10
    }))
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( cssVendorDestination ) )
    // .pipe( notify( { message: 'TASK: "vendorsCss" Completed! 💯', onLast: true } ) );
 });



 /**
  * Task: `vendorsJs`.
  *
  * Concatenate and uglify vendor JS scripts.
  *
  * This task does the following:
  *     1. Gets the source folder for JS vendor files
  *     2. Concatenates all the files and generates vendors.js
  *     3. Renames the JS file with suffix .min.js
  *     4. Uglifes/Minifies the JS file and generates vendors.min.js
  */
 gulp.task( 'vendorsJs', function() {
  gulp.src( jsVendorSRC )
  	// .pipe(debug({title: 'unicorn:'}))
    .pipe( concat( jsVendorFile + '.js' ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsVendorDestination ) )
    .pipe( rename( {
      basename: jsVendorFile,
      suffix: '.min'
    }))
    .pipe( uglify() )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsVendorDestination ) )
    // .pipe( notify( { message: 'TASK: "vendorsJs" Completed! 💯', onLast: true } ) );
 });


 /**
  * Task: `customJS`.
  *
  * Concatenate and uglify custom JS scripts.
  *
  * This task does the following:
  *     1. Gets the source folder for JS custom files
  *     2. Concatenates all the files and generates custom.js
  *     3. Renames the JS file with suffix .min.js
  *     4. Uglifes/Minifies the JS file and generates custom.min.js
  */
 gulp.task( 'customJS', function() {
    gulp.src( jsCustomSRC )
    .pipe( babel() ) // Transpiles all ES6 JS to ES5 JS code.
    .pipe( concat( jsCustomFile + '.js' ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsCustomDestination ) )
    .pipe( rename( {
      basename: jsCustomFile,
      suffix: '.min'
    }))
    .pipe( uglify() )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( jsCustomDestination ) )
    // .pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
 });


 /**
  * Task: `images`.
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
 gulp.task( 'images', function() {
  gulp.src( imagesSRC )
    .pipe( imagemin( {
          progressive: true,
          optimizationLevel: 3, // 0-7 low-high
          interlaced: true,
          svgoPlugins: [{removeViewBox: false}]
        } ) )
    .pipe(gulp.dest( imagesDestination ))
    // .pipe( notify( { message: 'TASK: "images" Completed! 💯', onLast: true } ) );
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
 gulp.task( 'translate', function () {
     return gulp.src( projectPHPWatchFiles )
         .pipe(sort())
         .pipe(wpPot( {
             domain        : text_domain,
             destFile      : destFile,
             package       : packageName,
             bugReport     : bugReport,
             lastTranslator: lastTranslator,
             team          : team
         } ))
        .pipe(gulp.dest(translatePath))
        // .pipe( notify( { message: 'TASK: "translate" Completed! 💯', onLast: true } ) )
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

 gulp.task('clean', del.bind(null, buildClean));

 gulp.task( 'copy', ['clean'], function() {
  var stream = gulp.src( buildThemeSRC )
    .pipe( gulp.dest( buildThemeDestination + project ) );
    return stream;
 });

 gulp.task( 'compress', ['copy'], function() {
  var stream = gulp.src( buildThemeDestination + project + '/**/*', {base: buildThemeDestination} )
    .pipe( zip( project + '.zip' ) )
    .pipe( gulp.dest( buildThemeDestination ) );
    return stream;
 });

 gulp.task( 'build', ['compress'], function() {
  var stream = gulp.src( buildFinalSRC + '/**/*', {base: buildFinalDestination} )
    .pipe( zip( 'main-files.zip' ) )
    .pipe( gulp.dest( buildFinalDestination ) )
    // .pipe( notify( { message: 'TASK: "build" Completed! 💯', onLast: true } ) );
    return stream;
 });



/**
  * Task: `deploy`.
  *
  * Updates remote folder with git.
  *
  * This task does the following:
  *     1. Connects a remote server via SSH.
  *     2. Enters a specific location in remote server via SSH command.
  *     3. Perform `git pull` operation to update that folder from primary remote repository.
  *
  * This task will run when you run the `gulp deploy` task.
  */

  gulp.task('deploy', function () {
    return gulpSSH
      .shell(['cd '+ process.env.SSH_REMOTE_PATH +'', 'git pull'], {filePath: 'shell.log'})
      .pipe(gulp.dest('logs'))
  })




 /**
  * Watch Tasks.
  *
  * Watches for file changes and runs specific tasks.
  */
 gulp.task( 'default', ['customCSS', 'vendorsCss', 'customJS', 'vendorsJs', 'images', 'browser-sync'], function () {
  gulp.watch( projectPHPWatchFiles, reload ); // Reload on PHP file changes.
  gulp.watch( customCSSWatchFiles, [ 'customCSS' ] ); // Reload on SCSS file changes.
  gulp.watch( vendorCSSWatchFiles, [ 'vendorsCss' ] ); // Reload on SCSS file changes.
  gulp.watch( vendorJSWatchFiles, [ 'vendorsJs', reload ] ); // Reload on vendorsJs file changes.
  gulp.watch( customJSWatchFiles, [ 'customJS', reload ] ); // Reload on customJS file changes.
 });