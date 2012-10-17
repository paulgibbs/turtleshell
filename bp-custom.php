<?php
function turtlepower() {
	bp_register_theme_package( array(
		'id'      => 'turtleshell',
		'name'    => __( 'Turtle Shell', 'buddypress' ),
		'version' => bp_get_version(),

		// Adjust these to point to your dev server if necessary
		'dir'     => trailingslashit( BP_PLUGIN_DIR . 'bp-themes/turtleshell' ),
		'url'     => trailingslashit( BP_PLUGIN_URL . 'bp-themes/turtleshell' )
	) );
}
add_action( 'bp_register_theme_packages', 'turtlepower' );

function turtlepower_package_id( $package_id ) {
	return 'turtleshell';
}
add_filter( 'pre_option__bp_theme_package_id', 'turtlepower_package_id' );

if ( ! defined( 'BP_DEFAULT_COMPONENT' ) )
	define( 'BP_DEFAULT_COMPONENT', 'profile' );
