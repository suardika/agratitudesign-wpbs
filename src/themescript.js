jQuery(function($) {
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	    event.preventDefault();
	    $(this).ekkoLightbox();
	});
});

// jQuery(document).ready(function($){
// }); 

// (function($) {
// })(jQuery);