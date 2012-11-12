<?php
/**
 * Single member profile/crop avatar form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_cropavatar_form' ); ?>

<form action="" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_profile_cropavatar_form_extras_top' ); ?>

	<p><?php _e( 'Crop your new avatar:', 'buddypress' ); ?></p>

	<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-to-crop" alt="<?php esc_attr_e( 'Avatar to crop', 'buddypress' ); ?>" />

	<div id="avatar-crop-pane">
		<img src="<?php bp_avatar_to_crop(); ?>" id="avatar-crop-preview" alt="<?php esc_attr_e( 'Avatar preview', 'buddypress' ); ?>" />
	</div>

	<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php esc_attr_e( 'Crop Image', 'buddypress' ); ?>" />
	<input type="hidden" name="image_src" id="image_src" value="<?php echo bp_avatar_to_crop_src(); ?>" />
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />

	<?php wp_nonce_field( 'bp_avatar_cropstore' ); ?>

	<?php do_action( 'bp_template_member_profile_cropavatar_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_profile_cropavatar_form' ); ?>
