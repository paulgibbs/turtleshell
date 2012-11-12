<?php
/**
 * Single member edit profile template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_edit_content' ); ?>

<div class="bp-member-profile-edit">

	<?php if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) : ?>

		<?php bp_get_template_part( 'members/single/profile/loop-profile-group' ); ?>

	<?php endif; ?>

</div><!-- .bp-member-profile-edit -->

<?php do_action( 'bp_template_after_member_profile_edit_content' ); ?>
