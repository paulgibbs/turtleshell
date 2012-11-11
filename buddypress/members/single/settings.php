<?php
/**
 * Single member settings template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_content' ); ?>

<?php
if ( bp_is_current_action( 'notifications' ) ) :
	bp_get_template_part( 'members/single/settings/form-settings-notifications' );

elseif ( bp_is_current_action( 'delete-account' ) ) :
	bp_get_template_part( 'members/single/settings/form-settings-deleteaccount' );

elseif ( bp_is_current_action( 'general' ) ) :
	bp_get_template_part( 'members/single/settings/form-settings-general' );

else :
	bp_get_template_part( 'members/single/plugins' );

endif;
?>

<?php do_action( 'bp_template_after_member_settings_content' ); ?>
