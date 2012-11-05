<?php
/**
 * No friend requests found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-template-notice info friend-requests">
	<p><?php printf( __( 'No-one wants to be your friend! You should get involved with the community and <a href="%s">meet new people</a>.', 'buddypress' ), esc_url( bp_get_members_directory_permalink() ) ); ?></p>
</div>
