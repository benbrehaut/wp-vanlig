$(function() {
    // Start jQuery

    /*
    * Console log that DOM is ready.
    */
    console.info( "DOM ready" );

    /**
    * Touch Device Detection
    **/
    var isTouchDevice = 'ontouchstart' in document.documentElement;
    var html = $('html');

    if ( isTouchDevice ) {
        html.addClass('touch');
    }
    else {
        html.addClass('no-touch');
    }

    // End jQuery
});
