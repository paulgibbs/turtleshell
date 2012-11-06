<?php
/**
 * No activity found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-template-notice activity">
	<?php if ( ! empty( $_GET['s'] ) ) : ?>
		<p><?php _e( "We couldn't find any activities that matched your request. Adjust your search terms and try again.", 'buddypress' ); ?></p>

	<?php else : ?>
		<p><?php _e( "We couldn't find any activities; check back soon!", 'buddypress' ); ?></p>

	<?php endif; ?>
</div>
