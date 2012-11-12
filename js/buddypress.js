/*! http://buddypress.org/ */
(function($) {

// Options
var bp_options = $.extend({
	menu_accessibility: true,
	menu_hoverIntent:   true,
	profile_visibility: true
}, bp_options);

// Functions
var buddypress = {

	/**
	 * Set up hoverIntent for the navigation menu
	 *
	 * @since BuddyPress (1.7)
	 */
	menu: function() {
		if (true !== bp_options.menu_hoverIntent) {
			return;
		}

		// Disable CSS :hover
		$('#bp-menu .bp-navigation').removeClass('no-menu-js');

		// Use hoverIntent to re-implement :hover
		$('#menu-bp li').hoverIntent({
			over: function(){
				$(this).find('> .sub-menu').addClass('bp-show-menu');
			},
			out: function(){
				$(this).find('> .sub-menu').removeClass('bp-show-menu');
			},
			timeout:     180,
			sensitivity: 7,
			interval:    100
		});
	},

	/**
	 * Makes the navigation menu more accessible to keyboard browsers
	 *
	 * @since BuddyPress (1.7)
	 */
	menu_accessibility: function() {
		if (true !== bp_options.menu_accessibility) {
			return;
		}

		$('#menu-bp').on('focus.bp_menu_accessibility', 'li a', function() {
			$(this).parent().find('> .sub-menu').addClass('bp-show-menu');

			// If this is a nested menu, we need to show the parent menu
			if ($(this).parent().parent().hasClass('sub-menu')) {
				$(this).parent().parent().addClass('bp-show-menu');
			}
		});

		$('#menu-bp').on('blur.bp_menu_accessibility', 'li a', function() {
			$(this).parent().find('> .sub-menu').removeClass('bp-show-menu');

			// If this is a nested menu, we need to show the parent menu
			if ($(this).parent().parent().hasClass('sub-menu')) {
				$(this).parent().parent().removeClass('bp-show-menu');
			}
		});
	},

	/**
	 * Profile field visibility toggle
	 *
	 * @since BuddyPress (1.7)
	 * @todo Make this only load on the profile edit apge
	 */
	profile_visibility: function() {
		if (true !== bp_options.profile_visibility) {
			return;
		}

		// @TODO: Ask Boone how this worked
	}
};


$(document).ready( function() {
	buddypress.menu();
	buddypress.menu_accessibility();
	buddypress.profile_visibility();
});

})(jQuery);
