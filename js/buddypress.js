/*! http://buddypress.org/ */
(function($) {
$(document).ready(function() {

var menu = $('#bp-member-menu');

// Member menu
if (menu.length > 0) {
	var init = menu.offset().top, docked;

	$(document).scroll(function() {
		if (!docked && (menu.offset().top - $(window).scrollTop() < 0)) {
			docked = true;
			menu.css({top: 0, position: 'fixed'});
			menu.addClass( 'docked' );
			$('.lorum').css( 'margin-left', '162px' );

		} else if (docked && $(window).scrollTop() <= init) {
			docked = false;
			menu.css({top: init + 'px', position: 'static'});
			menu.removeClass( 'docked' );
			$('.lorum').css( 'margin-left', 'auto' );
		}
	});
}

});
})( jQuery );