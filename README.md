# Halos

## Introduction
A starter theme for WordPress to create the next awesome custom theme for a client!

The purpose of these theme is to be a starting point for theme creation on build projects, reducing the time of removing parts of removing parts of other themes which we don't need, and adding our own. Simpley put, it should allow a developer to dive deep into the build project.

## Requirements
* [Node.js](https://nodejs.org/en/)
* [Grunt](http://www.gruntjs.com)
* [Sass](http://www.sass-lang.com)

## How to build
1. Clone this repo and place within your '/wp-content/themes/' folder.
````
$ cd /wp-project-folder/wp-content/themes/
$ git clone github.com/benbrehaut/halos.git
$ cd halos
````
2. While within the theme root, run;
````
npm install
````

3. Open the ``Gruntfile.js`` file and change the proxy name in BrowserSync (line :31) to your name of your MAMP site.

4. Then run the grunt command to start development!
````
grunt
````

This will open up a new BrowserSync session and start watching our files for changes and compiling and uglifying the JavaScript files.

## Tasks

### BrowserSync
###### Default task
BrowserSync is a useful tool for having your changes made when coding reload your tab automatically. On start of Grunt, BrowserSync will start a new session and provide you a local address (``localhost:3000``) and a external address (``192.168.30.##:3000``) which you can use to view your site on another device which isn't your computer.

BrowserSync watches for changes made to all ``.php``, ``.css`` and ``.js`` files, so any changes will be applied automatically.

Make sure you have changed the proxy name in the BrowserSync settings in the ``Gruntfile.js`` for BrowserSync to work.

### Styles
###### Default task
All Sass files are located within ``/assets/scss``, with the ``style.scss`` outputting into ``/assets/css/style.css`` This can be changed with ``Grunt.js`` file if you wish, but is probably best to keep it to this default location.

* ``style.css`` is blank on purpose, and is required by WordPress to register this as a theme.
* ``/assets/scss/style.scss`` is our main stylesheet, which will compile everything inside it into ``/assets/css/style.css``

### Scripts
###### Default task
All JavaScript files are located with ``/assets/js``, the ``main.js`` file is the main Javascript file for the theme, with external third party libraries within the ``libs`` folder. All files within this will be concatenated into the ``scripts.js`` file, includeding the ``main.js`` file, which is then concatenated and compressed into ``scripts.min.js``

* ``/assets/js/main.js`` is the main JavaScript file. This is where you should write all of your JavaScript.
* ``/assets/js/scripts.js`` is the uncompressed and concatenated JavaScript file from all of the files within the ``/assets/js/libs/*.js`` folder and ``/assets/js/main.js`` file.
* ``/assets/js/scripts.min.js`` is our compressed version of the ``/assets/js/scripts.js`` file.

### SVG Icons
###### Non default task
Instead of putting the full SVG code, we can reference them using ``<use xlink:href="#icon-name"></use>``

Place all of the icons within the ``/assets/img/icons/`` folder, and then run the command ``grunt svgstore`` which will then generate the ``svg-defs.svg`` file. This is linked at the bottom of the ``footer.php`` file.

You can then use the icons with the ``<use></use>`` tag!

````html
<svg class="icon">
  <use xlink:href="#icon-name-of-icon-file"></use>
</svg>
````

### Image Minification
###### Non default task
If you require images within the theme, you can minify the images without the lose of quality.

Run the command ``grunt imagemin`` which will minify all .jpg's, .png's and .gif's. The files will be replaced automatically with the new minified version.
