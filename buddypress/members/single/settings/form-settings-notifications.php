<?php
/**
 * Single member settings/notifications template
 *
 * @package BuddyPress
 * @subpackage turtleshell
 */
?>

<div class="bp-member-settings-notifications">

	<?php do_action( 'bp_template_before_member_settings_notifications_form' ); ?>

	<form action="<?php echo esc_url( bp_displayed_user_domain() . bp_get_settings_slug() . '/notifications/' ); ?>" method="post" enctype="multipart/form-data">

		<?php do_action( 'bp_template_member_settings_notifications_form_extras_top' ); ?>

		<p><?php _e( "We'll email you when the following events occur:", 'buddypress' ); ?></p>

		<?php do_action( 'bp_notification_settings' ); ?>

		<input type="submit" name="submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?>" />

		<?php wp_nonce_field( 'bp_settings_notifications' ); ?>

		<?php do_action( 'bp_template_member_settings_notifications_form_extras_bottom' ); ?>

	</form>

	<?php do_action( 'bp_template_after_member_settings_notifications_form' ); ?>

</div><!-- .bp-member-settings-notifications -->
