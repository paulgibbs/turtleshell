<?php
/**
 * No members found template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php if ( ! empty( $_GET['s'] ) ) : ?>
	<div class="bp-template-notice members">
		<p><?php _e( "We couldn't find anyone who matched your request. Adjust your search terms and try again.", 'buddypress' ); ?></p>
	</div>
<?php endif; ?>
