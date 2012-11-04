/*! http://buddypress.org/ */
(function($) {

var buddypress = {
	setup_menu: function() {
		// Prevent CSS :hover
		$('#bp-menu .bp-navigation').removeClass('no-menu-js');

		// Use hoverIntent to re-implement :hover
		$('#menu-bp li').hoverIntent({
			over: function(){
				$(this).find('> .sub-menu').addClass('bp-show-menu');
			},
			out: function(){
				$(this).find('> .sub-menu').removeClass('bp-show-menu');
			},

			timeout: 180,
			sensitivity: 7,
			interval: 100
		});
	}
};


$(document).ready(function(){
	buddypress.setup_menu();
});

})(jQuery);
