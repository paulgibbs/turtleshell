<?php
function turtlepower() {
	bp_register_theme_package( array(
		'id'      => 'turtleshell',
		'name'    => __( 'Turtle Shell', 'buddypress' ),
		'version' => bp_get_version(),

		// Adjust these to point to your dev server
		'dir'     => trailingslashit( '/Users/paul/Sites/example.com/wp-content/plugins/buddypress/bp-themes/turtleshell' ),
		'url'     => trailingslashit( 'http://example.com/wp-content/plugins/buddypress/bp-themes/turtleshell' )
	) );
}
add_action( 'bp_register_theme_packages', 'turtlepower' );

function turtlepower_package_id( $package_id ) {
	return 'turtleshell';
}
add_filter( 'pre_option__bp_theme_package_id', 'turtlepower_package_id' );
