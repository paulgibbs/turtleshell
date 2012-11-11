<?php
/**
 * Single member settings/general template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_general_form' ); ?>

<form action="<?php echo esc_url( bp_displayed_user_domain() . bp_get_settings_slug() . '/general/' ); ?>" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_settings_general_form_extras_top' ); ?>

	<?php if ( ! bp_current_user_can( 'bp_moderate' ) ) : ?>

		<label for="bp_pwd"><?php _e( 'Current Password <span>(required to update email or change current password)</span>', 'buddypress' ); ?></label>
		<input type="password" name="pwd" id="bp_pwd" ><a href="<?php echo esc_url( site_url( add_query_arg( array( 'action' => 'lostpassword' ), 'wp-login.php' ), 'login' ) ); ?>"><?php _e( 'Lost your password?', 'buddypress' ); ?></a>

	<?php endif; ?>

	<label for="bp_email"><?php _e( 'Account Email', 'buddypress' ); ?></label>
	<input type="text" name="email" id="bp_email" value="<?php echo esc_attr( bp_get_displayed_user_email() ); ?>" required />

	<fieldset>
		<label for="bp_pass1"><?php _e( 'Change Password <span>(leave blank for no change)</span>', 'buddypress' ); ?></label>
		<input type="password" name="pass1" id="bp_pass1" /><?php _e( 'New password', 'buddypress' ); ?><br />
		<input type="password" name="pass2" id="bp_pass2" /><?php _e( 'Repeat new password', 'buddypress' ); ?>
	</fieldset>

	<input type="submit" name="submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?>" />

	<?php wp_nonce_field( 'bp_settings_general' ); ?>

	<?php do_action( 'bp_template_member_settings_general_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_settings_general_form' ); ?>
