# Gulp Documentation


## Features.

1. Live reloads browser with BrowserSync
2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps, CSS minification, and Merging Media Queries
3. JS: Concatenates & uglifies Vendor and Custom JS files
4. Images: Minifies PNG, JPEG, GIF and SVG images
5. Watches files for changes in CSS or JS
6. Watches files for changes in PHP
7. Corrects the line endings
8. InjectCSS instead of browser page reload
9. Generates .pot file for i18n and l10n
 
## Introduction.

1. This gulp build script consist of mainly 2 files named `gulpfile.js`, `pacakage.json` where former file contains the primary programming regarding build process and latter contains some information about the project + names of node modules (development dependencies) which we will need to install to run the main build script on our machine.
2. Git is also supported in this workflow. There is only one file regarding git in the root folder named `.gitignore` and it contains the names of the files and folder which needs NOT to be included in the git repository.
3. To use this build workflow in a new project we'll need to copy all above mentioned files in the root folder of new project and should customize project information in `gulpfile.js` and `package.json` files additionally we'll also need to initiate a new git repository by using command `git init` (check evernote note on GIT for more git commands). Further, the folder structure should remain same, otherwise we'll also need to change source and destination variables in `gulpfile.js`.

## Getting Started?

1. First and foremost we'll need to install [Node.js](https://nodejs.org/en/download/) (a JS task runner), Gulp and Grunt are basically the Node.js based tools. To check if node is installed run the command `node -v`.
2. NPM (node.js package manager) is also installed when we install Node.js. To check if NPM is installed run the command `npm -v`.
3. Once Node.js and NPM is installed we'll need to install various Node.js packages via NPM which includes gulp, gulp-sass and browser-sync etc. All these pacakages are mentioned in `package.json` file. We can install any specific node package using command like `npm install <package-name> --save-dev` however gulp should be installed globally like `npm install gulp --global --save-dev`.
4. If we want to install all node packages mentioned in `package.json` file we can simply use the command `npm install`.
5. Once Node.js, NPM and all node packages are installed now we can run the build script by simply running the command `gulp`, there are some additional gulp tasks available like `gulp images`, `gulp translate` for this specific build script.

## Folder Structure.

This build script uses following folder structure (only showing relevant folders).

nucleus
|-- .git
|-- .dist
|-- images
|   |-- raw
|-- languages
|-- scripts
|   |-- js
|   |-- src
|-- styles
|   |-- css
|   |-- scss
|-- node_modules

## Available Tasks.

This build script supports 3 primary tasks which are following.

1. `gulp` is the default task which build the production CSS, JS and Image files from the source files and will watch the source files for any changes. If any changes are made the browser will automatically refresh. It provides a specific preview URL which is integarted with `browser-sync` module. However, to run the WordPress installation we'll need to install and run WAMP or XAMP separately.

2. `build` task will first remove any unncessary files/folders in the `.dist` folder and then it will re-create the final build files and its compressed version which will be ready to upload.

3. `translate` task will scan the theme `.php` files and will look for translatable strings, once it collects all such strings it'll create a `.pot` file in the `languages` folder located at theme root. Before running the `build` task this task should be executed at-least once.
