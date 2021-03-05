/**
 * WPGulp Configuration File
 *
 * 1. Edit the variables as per your project requirements.
 * 2. In paths you can add <<glob or array of globs>>.
 *
 * @package WPGulp
 */

module.exports = {

    // Project options.
    project: '_nucleus', // Project Name.
	projectURL: 'http://localhost:7000/', // Local project URL of your already running WordPress site. Could be something like wpgulp.local or localhost:3000 depending upon your local WordPress setup.
	productURL: './', // Theme/Plugin URL. Leave it like it is, since our gulpfile.js lives in the root folder.
	browserAutoOpen: false,
	injectChanges: true,

	// Style options.
	styleSRC: './styles/scss/main.scss', // Path to main .scss file.
	styleDestination: './styles/css/', // Path to place the compiled CSS file. Default set to root folder.
	outputStyle: 'compact', // Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
	errLogToConsole: true,
	precision: 10,

	// JS Custom options.
	scriptSRC: './scripts/es/main.js', // Path to JS custom scripts folder.
	scriptDestination: './scripts/js/', // Path to place the compiled JS custom scripts file.
	scriptBundleFile: 'main', // Compiled JS custom file name. Default set to custom i.e. custom.js.
    JS_ENTRY_POINTS: [
        'scripts/es/main.js',
    ],
  
	// Images options.
	imagesSRC: './images/raw/**/*', // Source folder of images which should be optimized and watched. You can also specify types e.g. raw/**.{png,jpg,gif} in the glob.
	imagesDestination: './images/', // Destination folder of optimized images. Must be different from the imagesSRC folder.

	// Watch files paths.
	watchStyles: './assets/css/**/*.scss', // Path to all *.scss files inside css folder and inside them.
	watchJsVendor: './assets/js/vendor/*.js', // Path to all vendor JS files.
	watchJsCustom: './assets/js/custom/*.js', // Path to all custom JS files.
	watchPhp: './**/*.php', // Path to all PHP files.

	// Translation options.
	textDomain: '_nucleus', // Your textdomain here.
	translationFile: 'nucleus.pot', // Name of the translation file.
	translationDestination: './languages', // Where to save the translation files.
	packageName: '_nucleus', // Package name.
	bugReport: 'imfaisalkh@gmail.com', // Where can users report bugs.
	lastTranslator: 'Faisal Khurshid <imfaisalkh@gmail.com>', // Last translator Email ID.
	team: 'wpscouts <wpscouts.hq@gmail.com>', // Team's Email ID.


	// Browsers you care about for autoprefixing. Browserlist https://github.com/ai/browserslist
	// The following list is set as per WordPress requirements. Though, Feel free to change.
	BROWSERS_LIST: [
		'last 2 version',
		'> 1%',
		'ie >= 11',
		'last 1 Android versions',
		'last 1 ChromeAndroid versions',
		'last 2 Chrome versions',
		'last 2 Firefox versions',
		'last 2 Safari versions',
		'last 2 iOS versions',
		'last 2 Edge versions',
		'last 2 Opera versions'
	],

    buildClean: ['./.dist/main-files.zip', './.dist/main-files/theme/' + this.project, './.dist/main-files/theme/' + this.project + '.zip'],

    buildThemeSRC: [
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
        './**/*.dat',
        './**/*.wie',
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
        '!./node_modules/**/*',
        '!./logs/**/*',
        '!./.bowerrc',
        '!./.babelrc',
        '!./wpgulp.config.js',
        '!./.env',
        '!./.eslintrc.json',
        '!./.gitignore',
        '!./logs/**/*',
        '!./bower.json',
        '!./gulpfile.js',
        '!./package.json',
        '!./package-lock.json',
        '!./README.md'
    ],
    buildThemeDestination: './.dist/main-files/theme/',
    buildFinalSRC: './.dist/main-files/',
    buildFinalDestination: './.dist/',

    // Watch files paths.
    compileCSSWatchFiles: './styles/scss/**/*.scss', // Path to all *.scss files inside css folder and inside them.
    compileJSWatchFiles: './scripts/es/*.js', // Path to all custom JS files.
    projectPHPWatchFiles: ['./**/*.php', '!./.git/**/*', '!./.dist/**/*', '!./.vendors/**/*', '!./node_modules/**/*', '!./styles/**/*', '!./scripts/**/*', '!./languages/**/*', '!./images/**/*', '!./fonts/**/*', '!./admin/plugins/lib/**/*'], // Path to all PHP files.

};
