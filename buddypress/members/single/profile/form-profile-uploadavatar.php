<?php
/**
 * Single member profile/upload avatar form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_uploadavatar_form' ); ?>

<form action="" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_profile_uploadavatar_form_extras_top' ); ?>

	<p><?php _e( 'Choose a JPG, GIF, or PNG format photo from your computer, and then press the <em>Upload Image</em> button to proceed.', 'buddypress' ); ?></p>

	<p id="avatar-upload">
		<input type="file" name="file" id="file" />
		<input type="submit" name="upload" id="upload" value="<?php esc_attr_e( 'Upload Image', 'buddypress' ); ?>" />
		<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
	</p>

	<?php wp_nonce_field( 'bp_avatar_upload' ); ?>

	<?php do_action( 'bp_template_member_profile_uploadavatar_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_before_member_profile_uploadavatar_form' ); ?>
