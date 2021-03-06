# Vanlig

## Introduction
A starter theme for WordPress to create your next amazing site!

The purpose of these theme is to be a starting point for theme creation, reducing the time of removing parts of removing parts of other themes which are not needed, and adding our own. Simpley put, it should allow you as a developer to dive deep into your project!

## Requirements
* [Node.js](https://nodejs.org/en/)
* [Gulp](https://gulpjs.com/)
* [Sass](http://www.sass-lang.com)

## How to build
1. Clone this repo and place within your '/wp-content/themes/' folder.
````
$ cd /wp-project-folder/wp-content/themes/
$ git clone github.com/benbrehaut/vanlig.git
$ cd vanlig
````
2. While within the theme root, run;
````
npm install
````

3. Open the ``gulpfile.js`` file and change the proxy name in BrowserSync for your site URL.

4. Then run the npm command to start development!
````
npm run dev
````

This will open up a new BrowserSync session and start watching our files for changes and compiling and uglifying the JavaScript files.

## Tasks

### BrowserSync
###### Default task
BrowserSync is a useful tool for having your changes made when coding reload your tab automatically. On start of Gulp, BrowserSync will start a new session and provide you a local address (``localhost:3000``) and a external address (``192.168.##.##:3000``) which you can use to view your site on another device which isn't your computer.

BrowserSync watches for changes made to all ``.php``, ``.css`` and ``.js`` files, so any changes will be applied automatically.

Make sure you have changed the proxy name in the BrowserSync settings in the ``gulpfile.js`` for BrowserSync to work.

### Styles
###### Default task
All Sass files are located within ``/assets/scss``, with the ``style.scss`` outputting into ``/assets/css/dist/main.css`` This can be changed with ``gulpfile.js`` file if you wish, but is probably best to keep it to this default location.

* ``style.css`` within the root of this theme is blank on purpose, and is required by WordPress to register this as a theme.
* ``/assets/scss/style.scss`` is our main stylesheet, which will compile everything inside it into ``/assets/css/dist/main.css`` and also the minified and compressed version, ``/assets/css/dist/main.min.css``

### Scripts
###### Default task
All JavaScript files are located with ``/assets/js``, the ``scripts.js`` file is the main Javascript file for the theme, with external third party libraries within the ``vendor`` folder. All files within this will be concatenated into the ``dist/main.js`` file and ``dist/main.min.js``

The scripts task will also run the main JavaScript file through Babel, which means you can use all the new ES2015, ES2016 etc. features without fear of them not working in some older browsers!

* ``/assets/js/scripts.js`` is the main JavaScript file. This is where you should write all of your JavaScript.
* ``/assets/js/dist/main.js`` is the uncompressed and concatenated JavaScript file from all of the files within the ``/assets/js/vendor/*.js`` folder and ``/assets/js/scripts.js`` file.
* ``/assets/js/dist/main.min.js`` is our compressed version of the ``/assets/js/dist/main.js`` file.

### SVG Icons
###### Non default task
Instead of putting the full SVG code, we can reference them using ``<use xlink:href="#icon-name"></use>``

Place all of the icons within the ``/assets/icons/`` folder, and then run the command ``gulp svgstore`` which will then generate the ``svg-defs.svg`` file. This is linked at the bottom of the ``footer.php`` file.

You can then use the icons with the ``<use></use>`` tag!

````html
<svg class="icon">
  <use xlink:href="#icon-name-of-icon-file"></use>
</svg>
````

### Image Minification
###### Non default task
If you require images within the theme, you can minify the images without the lose of quality.

Run the command ``gulp imgs`` which will minify all .jpg's, .png's and .gif's. The files will be replaced automatically with the new minified version.
