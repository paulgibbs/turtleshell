<?php
/**
 * Single member view profile template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_profile_view_content' ); ?>

<div class="bp-member-profile-view">

	<?php if ( bp_has_profile() ) : ?>

		<?php bp_get_template_part( 'members/single/profile/loop-profile-group' ); ?>

	<?php endif; ?>

</div><!-- .bp-member-profile-view -->

<?php do_action( 'bp_template_after_member_profile_view_content' ); ?>
