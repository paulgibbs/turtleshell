/*! http://buddypress.org/ */
(function( $ ) {
$( document ).ready(function() {

var menu = $('#bp-member-menu'),
init = menu.offset().top,
docked;

$(document).scroll(function() {
	if (!docked && (menu.offset().top - $(window).scrollTop() < 0)) {
		menu.css( 'top', 0 );
		menu.css( 'position', 'fixed' );
		menu.addClass( 'docked' );
		docked = true;
		$('.lorum').css( 'margin-left', '160px' );

	} else if (docked && $(window).scrollTop() <= init) {
		menu.css( 'position', 'static' );
		menu.css( 'top', init + 'px' );
		menu.removeClass( 'docked' );
		docked = false;
		$('.lorum').css( 'margin-left', 'auto' );
	}
});

});
})( jQuery );