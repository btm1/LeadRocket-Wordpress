// LeadRocket Theme Scripts

// @codekit-prepend "bootstrap.js"
// @codekit-prepend "../vendor/jquery.fitvids.js"
// @codekit-prepend "../vendor/jquery.bxslider/jquery.bxslider.js"

(function($, window, document, undefined) {
    'use strict';

    $(document).ready( function() {
    	// Slideshow
    	$('.slideshow').bxSlider({
    		pager: false
    	});
    });

})(jQuery, window, document);