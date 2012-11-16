<?php
/**
 * Single member settings/capabilities form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_capabilities_form' ); ?>

<form action="<?php echo esc_url( bp_displayed_user_domain() . bp_get_settings_slug() . '/capabilities/' ); ?>" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_settings_capabilities_form_extras_top' ); ?>

	<input type="checkbox" name="user-spammer" id="bp-user-spammer" value="1" <?php checked( bp_is_user_spammer( bp_displayed_user_id() ) ); ?> />
	<label for="bp-user-spammer"><?php _e( 'This user is a spammer.', 'buddypress' ); ?></label>
	
	<input type="submit" value="<?php esc_attr_e( 'Save', 'buddypress' ); ?>" name="capabilities-submit" />

	<?php wp_nonce_field( 'capabilities' ); ?>

	<?php do_action( 'bp_template_member_settings_capabilities_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_settings_capabilities_form' ); ?>
