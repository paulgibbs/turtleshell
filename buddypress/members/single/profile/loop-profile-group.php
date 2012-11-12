<?php
/**
 * Single member profile group loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_group_loop' ); ?>

<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

	<?php
	if ( bp_is_current_action( 'edit' ) ) :
		bp_get_template_part( 'members/single/profile/loop-single-profile-group-edit' );

	elseif ( bp_profile_group_has_fields() ) :
		bp_get_template_part( 'members/single/profile/loop-single-profile-group-view' );
	endif;
	?>

<?php endwhile; ?>

<?php do_action( 'bp_template_after_member_profile_group_loop' ); ?>
