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
	bp_get_template_part( 'members/single/settings/notifications' );

elseif ( bp_is_current_action( 'delete-account' ) ) :
	bp_get_template_part( 'members/single/settings/delete-account' );

elseif ( bp_is_current_action( 'general' ) ) :
	bp_get_template_part( 'members/single/settings/general' );

elseif ( bp_is_current_action( 'capabilities' ) ) :
	bp_get_template_part( 'members/single/settings/capabilities' );

else :
	bp_get_template_part( 'members/single/plugins' );

endif;
?>

<?php do_action( 'bp_template_after_member_settings_content' ); ?>
