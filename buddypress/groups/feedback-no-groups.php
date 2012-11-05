<?php
/**
 * No groups found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-template-notice groups">
	<?php if ( ! empty( $_GET['s'] ) ) : ?>
		<p><?php _e( "We couldn't find any groups that matched your request. Adjust your search terms and try again.", 'buddypress' ); ?></p>
	<?php else : ?>
		<p><?php _e( "We couldn't find any groups; check back soon!", 'buddypress' ); ?></p>
	<?php endif; ?>
</div>
