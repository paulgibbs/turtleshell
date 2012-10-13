/*! http://buddypress.org/ */
(function($) {

	var bp_members_menu = {
		menu: null,
		offset: 0,

		init: function() {
			this.menu = $('#bp-member-menu');
			if (this.menu.length <= 0)
				return;

			this.offset = this.menu.offset().top;
			$(document).scroll(function() { bp_members_menu.scroll(); });
		},

		scroll: function() {
			var obj = bp_members_menu,
			docked = obj.menu.hasClass('docked');

			if (!docked && (obj.menu.offset().top - $(window).scrollTop() < 0)) {
				obj.menu.addClass('docked');
				$('.bp-member-content').css( 'margin-left', '162px' );

			} else if (docked && $(window).scrollTop() <= obj.offset) {
				obj.menu.removeClass( 'docked' );
				$('.bp-member-content').css( 'margin-left', 'auto' );
			}
		}
	};


	$(document).ready(function() {
		bp_members_menu.init();
	});

})(jQuery);
