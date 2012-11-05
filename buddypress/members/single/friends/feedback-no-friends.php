<?php
/**
 * No friends found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php if ( bp_is_my_profile() ) : ?>
	<div class="bp-template-notice info friends">
		<p><?php printf( __( 'You have no friends! Get involved with the community and <a href="%s">meet people</a>.', 'buddypress' ), esc_url( bp_get_members_directory_permalink() ) ); ?></p>
	</div>

<?php else : ?>
	<div class="bp-template-notice friends">
		<p><?php printf( __( '%s has no friends, and is feeling a little lonely.', 'buddypress' ), bp_get_displayed_user_fullname() ); ?></p>
	</div>

<?php endif; ?>
