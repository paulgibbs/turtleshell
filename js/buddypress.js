/*! http://buddypress.org/ */
(function($) {

	var bp_members_menu = {
		container: null,
		menu: null,
		offset: 0,

		init: function() {
			this.menu = $('#bp-member-menu');
			if (this.menu.length <= 0)
				return;

			this.container = $('.bp-member-content');
			this.offset    = this.menu.offset().top;

			$(document).scroll(function() { bp_members_menu.scroll(); });
		},

		scroll: function() {
			var obj = bp_members_menu,
			docked = obj.menu.hasClass('docked');

			if (!docked && (obj.menu.offset().top - $(window).scrollTop() < 0)) {
				obj.menu.addClass('docked');

			} else if (docked && $(window).scrollTop() <= obj.offset) {
				obj.menu.removeClass('docked');
			}
		}
	};


	$(document).ready(function() {
		bp_members_menu.init();
	});

})(jQuery);
