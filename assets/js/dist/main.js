'use strict';

$(function () {
  // Start jQuery

  /*
  * Console log that DOM is ready.
  */
  console.info("DOM ready");

  /**
  * Touch Device Detection
  **/
  var isTouchDevice = 'ontouchstart' in document.documentElement;
  var html = $('html');

  if (isTouchDevice) {
    html.addClass('touch');
  } else {
    html.addClass('no-touch');
  }

  /**
  * Deteching the users browser
  * @return {String} $browser.name
  * @return {Number} $browser.version
  **/
  var $browser;

  function checkBrowserVer() {

    var nVer = navigator.appVersion;
    var nAgt = navigator.userAgent;
    var browserName = navigator.appName;
    var fullVersion = '' + parseFloat(navigator.appVersion);
    var majorVersion = parseInt(navigator.appVersion, 10);
    var nameOffset, verOffset, ix;

    // In Opera, the true version is after "Opera" or after "Version"
    if ((verOffset = nAgt.indexOf("Opera")) != -1) {
      browserName = "Opera";
      fullVersion = nAgt.substring(verOffset + 6);
      if ((verOffset = nAgt.indexOf("Version")) != -1) fullVersion = nAgt.substring(verOffset + 8);
    }
    // In MSIE, the true version is after "MSIE" in userAgent
    else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
        browserName = "Microsoft Internet Explorer";
        fullVersion = nAgt.substring(verOffset + 5);
      }
      // In Chrome, the true version is after "Chrome"
      else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
          browserName = "Chrome";
          fullVersion = nAgt.substring(verOffset + 7);
        }
        // In Safari, the true version is after "Safari" or after "Version"
        else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
            browserName = "Safari";
            fullVersion = nAgt.substring(verOffset + 7);
            if ((verOffset = nAgt.indexOf("Version")) != -1) fullVersion = nAgt.substring(verOffset + 8);
          }
          // In Firefox, the true version is after "Firefox"
          else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
              browserName = "Firefox";
              fullVersion = nAgt.substring(verOffset + 8);
            }
            // In most other browsers, "name/version" is at the end of userAgent
            else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) < (verOffset = nAgt.lastIndexOf('/'))) {
                browserName = nAgt.substring(nameOffset, verOffset);
                fullVersion = nAgt.substring(verOffset + 1);
                if (browserName.toLowerCase() == browserName.toUpperCase()) {
                  browserName = navigator.appName;
                }
              }
    // trim the fullVersion string at semicolon/space if present
    if ((ix = fullVersion.indexOf(";")) != -1) fullVersion = fullVersion.substring(0, ix);
    if ((ix = fullVersion.indexOf(" ")) != -1) fullVersion = fullVersion.substring(0, ix);

    majorVersion = parseInt('' + fullVersion, 10);

    if (isNaN(majorVersion)) {
      fullVersion = '' + parseFloat(navigator.appVersion);
      majorVersion = parseInt(navigator.appVersion, 10);
    }

    return {
      name: browserName,
      version: majorVersion
    };
  }

  var $browser = checkBrowserVer();

  $('html').addClass($browser.name.toLowerCase());
  $('html').addClass($browser.name.toLowerCase() + '-' + $browser.version);

  /**
  * Toggle Site Menu
  **/
  $('.js-site-toggle-menu').click(function () {
    $(this).toggleClass('is-active');
    $('.js-site-menu').toggleClass('is-active');
  });

  // End jQuery
});