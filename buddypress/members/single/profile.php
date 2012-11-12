<?php
/**
 * Single member profile template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_content' ); ?>

<?php
if ( bp_is_current_action( 'edit' ) ) :
	bp_get_template_part( 'members/single/profile/edit' );

elseif ( bp_is_current_action( 'change-avatar' ) && ! (int) bp_get_option( 'bp-disable-avatar-uploads' ) ) :
	bp_get_template_part( 'members/single/profile/change-avatar' );

elseif ( bp_is_current_action( 'change-avatar' ) ) :
	bp_get_template_part( 'members/single/profile/feedback-no-avatars' );

elseif ( bp_is_active( 'xprofile' ) ) :
	bp_get_template_part( 'members/single/profile/profile-loop' );

endif;
?>

<?php do_action( 'bp_template_after_member_profile_content' ); ?>
