<?php
/**
 * Single member settings/notifications template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_notifications_content' ); ?>

<div class="bp-member-settings-notifications">

	<?php bp_get_template_part( 'members/single/settings/form-settings-notifications' ); ?>

</div><!-- .bp-member-settings-notifications -->

<?php do_action( 'bp_template_after_member_settings_notifications_content' ); ?>
