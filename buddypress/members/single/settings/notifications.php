<?php
/**
 * Notification Settings Notifications content part
 *
 * @package BuddyPress
 * @subpackage turtleshell
 */
?>

<h4><?php _e( 'Email Notification', 'buddypress' ); ?></h4>

<?php do_action( 'bp_template_content' ); ?>

<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/notifications'; ?>" method="post" class="standard-form" id="settings-form">
	<p><?php _e( 'Send a notification by email when:', 'buddypress' ); ?></p>

	<?php do_action( 'bp_notification_settings' ); ?>

	<?php do_action( 'bp_template_members_notification_settings_before_submit' ); ?>

	<div class="submit">
		<input type="submit" name="submit" value="<?php _e( 'Save Changes', 'buddypress' ); ?>" id="submit" class="auto" />
	</div>

	<?php do_action( 'bp_template_members_notification_settings_after_submit' ); ?>

	<?php wp_nonce_field('bp_settings_notifications'); ?>

</form>