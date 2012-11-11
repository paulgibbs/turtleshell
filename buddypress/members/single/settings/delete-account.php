<?php
/**
 * Single member settings/delete account template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
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

	<?php bp_get_template_part( 'members/single/settings/form-settings-deleteaccount' ); ?>

</div><!-- .bp-member-settings-deleteaccount -->
