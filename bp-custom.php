<?php
function turtlepower() {
	bp_register_theme_package( array(
		'id'      => 'turtleshell',
		'name'    => __( 'Turtle Shell', 'buddypress' ),
		'version' => bp_get_version(),

		// Adjust these to point to your dev server if necessary
		'dir'     => trailingslashit( BP_PLUGIN_DIR . 'bp-templates/turtleshell' ),
		'url'     => trailingslashit( BP_PLUGIN_URL . 'bp-templates/turtleshell' )
	) );
}
add_action( 'bp_register_theme_directory', 'turtlepower' );

function turtlepower_package_id( $package_id ) {
	return 'turtleshell';
}
add_filter( 'pre_option__bp_theme_package_id', 'turtlepower_package_id' );

// Proposed BP core change: see http://buddypress.trac.wordpress.org/ticket/3741#comment:43
function turtlepower_kill_legacy_js_and_css() {
	wp_dequeue_script( 'groups_widget_groups_list-js' );
	wp_dequeue_script( 'bp_core_widget_members-js' );
}
add_action( 'wp', 'turtlepower_kill_legacy_js_and_css', 999 );

// See turtlepower_bp_core_render_message()
function turtlepower_bp_core_setup_message() {
	if ( ! has_action( 'template_notices', 'bp_core_render_message' ) )
		return;

	remove_action( 'template_notices', 'bp_core_render_message' );
	add_action( 'template_notices', 'turtlepower_bp_core_render_message' );
}
add_action( 'bp_actions', 'turtlepower_bp_core_setup_message', 6 );

// Proposed BP core change: add "bp-template-notice" class to message ID
function turtlepower_bp_core_render_message() {
	global $bp;

	if ( !empty( $bp->template_message ) ) :
		$type    = ( 'success' == $bp->template_message_type ) ? 'updated' : 'error';
		$content = apply_filters( 'bp_core_render_message_content', $bp->template_message, $type ); ?>

		<div id="message" class="bp-template-notice <?php echo $type; ?>">

			<?php echo $content; ?>

		</div>

	<?php

		do_action( 'bp_core_render_message' );

	endif;
}

if ( ! defined( 'BP_DEFAULT_COMPONENT' ) )
	define( 'BP_DEFAULT_COMPONENT', 'profile' );
