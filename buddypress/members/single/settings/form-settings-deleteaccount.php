<?php
/**
 * Single member settings/delete account form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_deleteaccount_form' ); ?>

<form action="<?php echo esc_url( bp_displayed_user_domain() . bp_get_settings_slug() . '/delete-account/' ); ?>" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_settings_deleteaccount_form_extras_top' ); ?>

	<label>
		<input type="checkbox" name="delete-account-understand" value="1" required />
		 <?php _e( "I'm sure that I want to permanently remove my account; bye!", 'buddypress' ); ?>
	</label>

	<input type="submit" value="<?php esc_attr_e( 'Delete Account', 'buddypress' ); ?>" name="delete-account-button" />

	<?php wp_nonce_field( 'delete-account' ); ?>

	<?php do_action( 'bp_template_member_settings_deleteaccount_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_settings_deleteaccount_form' ); ?>
