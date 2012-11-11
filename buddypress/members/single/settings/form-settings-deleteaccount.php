<?php
/**
 * Single member settings/delete account template
 *
 * @package BuddyPress
 * @subpackage turtleshell
 */
?>

<div class="bp-member-settings-deleteaccount">

	<div class="bp-template-notice important">
		
		<?php if ( bp_is_my_profile() ) : ?>
			<p><?php _e( 'Deleting your account will destroy all of the content you have created. It will be completely irrecoverable.', 'buddypress' ); ?></p>
		<?php else : ?>
			<p><?php _e( 'Deleting this account will destroy all of the content it has created. It will be completely irrecoverable.', 'buddypress' ); ?></p>
		<?php endif; ?>

	</div><!-- .bp-template-notice -->

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

</div><!-- .bp-member-settings-deleteaccount -->
