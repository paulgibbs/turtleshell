<?php
/**
 * Member profile 'avatar upload disabled' template part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-template-notice profile-change-avatar info">
	<p><?php printf( __( 'To change your avatar, please create an account with <a href="%1$s">Gravatar</a> using the same email address that you used to register with on this site (%2$s).', 'buddypress' ), 'http://gravatar.com', bp_get_displayed_user_email() ); ?></p>
</div>
