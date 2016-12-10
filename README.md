# Halos

## Introduction
A starter theme for WordPress to create the next awesome custom theme for a client!

The purpose of these theme is to be a starting point for theme creation on build projects, reducing the time of removing parts of removing parts of other themes which we don't need, and adding our own. Simpley put, it should allow a developer to dive deep into the build project.

## Requirements
* [Node.js](https://nodejs.org/en/)
* [Grunt](http://www.gruntjs.com)
* [Sass](http://www.sass-lang.com)

## How to build
1. Clone this repo and place within your 'wp-content/themes' folder.
````
$ cd wp-project-folder/wp-content/themes
$ git clone github.com/benbrehaut/halos.git
$ cd halos
````
2. While within the theme root, run;
````
npm install
grunt
````

### Styles
All Sass files are located within ``assets/scss``, with the ``style.scss`` outputting into ``assets/css/style.css`` This can be changed with ``Grunt.js`` file if you wish, but is probably best to keep it to this default location.

* ``style.css`` is blank on purpose, and is required by WordPress to register this as a theme.
* ``assets/scss/style.scss`` is our main stylesheet, which will compile everything inside it into ``assets/css/style.css``

### Scripts
All JavaScript files are located with ``assets/js``, the ``main.js`` file is the main Javascript file for the theme, with external third party libraries within the ``libs`` folder. All files within this will be concatenated into the ``scripts.js`` file, includeding the ``main.js`` file, which is then concatenated and compressed into ``scripts.min.js``

* ``assets/js/main.js`` is the main JavaScript file. This is where you should write all of your JavaScript.
* ``assets/js/scripts.js`` is the uncompressed and concatenated JavaScript file from all of the files within the ``assets/js/libs/*.js`` folder and ``assets/js/main.js`` file.
* ``assets/js/scripts.min.js`` is our compressed version of the ``assets/js/scripts.js`` file.
