//	Backbone v1.7, Copyright 2014, Joe Mottershaw, https://github.com/joemottershaw/
//	================================================================================

//	Table of Contents
//	==================================================
//		#Tipsy
//		#Scroll To Top


//	#Tipsy
//	==================================================

	// Show/Hide
		jQuery('.tip-tl').tipsy({ gravity: 'se', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-t').tipsy({ gravity: 's', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-tr').tipsy({ gravity: 'sw', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-r').tipsy({ gravity: 'w', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-br').tipsy({ gravity: 'nw', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-b').tipsy({ gravity: 'n', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-bl').tipsy({ gravity: 'ne', html: true, title: 'data-tooltip', offset: 5, live: true });
		jQuery('.tip-l').tipsy({ gravity: 'e', html: true, title: 'data-tooltip', offset: 5, live: true });

	// Fade In/Out
		jQuery('.tip-tl-fade').tipsy({ gravity: 'se', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-t-fade').tipsy({ gravity: 's', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-tr-fade').tipsy({ gravity: 'sw', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-r-fade').tipsy({ gravity: 'w', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-br-fade').tipsy({ gravity: 'nw', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-b-fade').tipsy({ gravity: 'n', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-bl-fade').tipsy({ gravity: 'ne', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });
		jQuery('.tip-l-fade').tipsy({ gravity: 'e', html: true, title: 'data-tooltip', offset: 5, fade: true, fadeSpeed: 150, live: true });


//	#Scroll To Top
//	==================================================

	jQuery(document).ready(function() {
		jQuery('.scroll-to-top').click(function() {
			jQuery('html, body').animate({ scrollTop: 0 }, 1600, 'easeInOutQuart');
			return false;
		});
	});
