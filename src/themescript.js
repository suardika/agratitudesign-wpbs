// jQuery(document).ready(function($){
// }); 

// (function($) {
// })(jQuery);
// 

// ekkoLightbox Script
jQuery(function($) {
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	    event.preventDefault();
	    $(this).ekkoLightbox();
	});
});

// Portfolio Script
jQuery(function($) {
	$(document).ready(function(){
	    if (Modernizr.touch) {
	        // show the close overlay button
	        $(".close-overlay").removeClass("hidden");
	        // handle the adding of hover class when clicked
	        $(".img").click(function(e){
	            if (!$(this).hasClass("hover")) {
	                $(this).addClass("hover");
	            }
	        });
	        // handle the closing of the overlay
	        $(".close-overlay").click(function(e){
	            e.preventDefault();
	            e.stopPropagation();
	            if ($(this).closest(".img").hasClass("hover")) {
	                $(this).closest(".img").removeClass("hover");
	            }
	        });
	    } else {
	        // handle the mouseenter functionality
	        $(".img").mouseenter(function(){
	            $(this).addClass("hover");
	        })
	        // handle the mouseleave functionality
	        .mouseleave(function(){
	            $(this).removeClass("hover");
	        });
	    }
	});
});

// owlCarousel Script
jQuery(function($) {
	$('#blog-carousel').owlCarousel({
	    loop:true,
	    margin:15,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:2
	        },
	        1000:{
	            items:3
	        }
	    }
	})
});


