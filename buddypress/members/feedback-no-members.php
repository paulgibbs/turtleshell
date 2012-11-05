<?php
/**
 * No members found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-template-notice members">
	<?php if ( ! empty( $_GET['s'] ) ) : ?>
		<p><?php _e( "We couldn't find anyone who matched your request. Adjust your search terms and try again.", 'buddypress' ); ?></p>
	<?php endif; ?>
</div>
