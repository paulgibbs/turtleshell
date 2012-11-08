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
add_action( 'bp_register_theme_packages', 'turtlepower' );

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

if ( ! defined( 'BP_DEFAULT_COMPONENT' ) )
	define( 'BP_DEFAULT_COMPONENT', 'profile' );

/**
 * Looks at activity comments on the current activity item, and prints the comments' user's avatar wrapped in <LI> tags.
 *
 * Use this function to easily output activity comment authors' avatars.
 *
 * @param array $args See {@link bp_core_fetch_avatar} for accepted values
 * @since BuddyPress (1.7)
 */
function bp_activity_comments_user_avatars( $args = array() ) {
	$defaults = array(
		'height' => false,
		'html'   => true,
		'type'   => 'thumb',
		'width'  => false,
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );

	// Get the user IDs of everyone who has left a comment to the current activity item
	$user_ids = bp_activity_get_comments_user_ids();

	$output = array();
	foreach ( (array) $user_ids as $user_id ) {
		$profile_link = bp_core_get_user_domain( $user_id );
		$image_html   = bp_core_fetch_avatar( array( 'item_id' => $user_id, 'height' => $height, 'html' => $html, 'type' => $type, 'width' => $width, ) );

		$output[] = sprintf( '<a href="%1$s">%2$s</a>', esc_url( $profile_link ), $image_html );
	}

	echo apply_filters( 'bp_activity_comments_user_avatars', '<li>' . implode( '</li><li>', $output ) . '</li>', $args, $output );
}

/**
 * Returns the user IDs of everyone who's written an activity comment on the current activity item.
 *
 * @return bool|array Returns false if there is no current activity items
 * @since BuddyPress (1.7)
 */
function bp_activity_get_comments_user_ids() {
	if ( empty( $GLOBALS['activities_template']->activity ) || empty( $GLOBALS['activities_template']->activity->children ) )
		return false;

	$user_ids = (array) bp_activity_recuse_comments_user_ids( $GLOBALS['activities_template']->activity->children );
	return apply_filters( 'bp_activity_get_comments_user_ids', array_unique( $user_ids ) );
}

	/**
	 * Recurse through all activity comments and collect the IDs of the users who wrote them.
	 *
	 * @param array $comments Array of {@link BP_Activity_Activity} items
	 * @return array Array of user IDs
	 * @since BuddyPress (1.7)
	 */
	function bp_activity_recuse_comments_user_ids( array $comments ) {
		$user_ids = array();

		foreach ( $comments as $comment ) {
			// If a user is a spammer, their activity items will have been automatically marked as spam. Skip these.
			if ( $comment->is_spam )
				continue;

			$user_ids[] = $comment->user_id;

			// Check for commentception
			if ( ! empty( $comment->children ) )
				$user_ids = array_merge( $user_ids, bp_activity_recuse_comments_user_ids( $comment->children ) );
		}

		return $user_ids;
	}
