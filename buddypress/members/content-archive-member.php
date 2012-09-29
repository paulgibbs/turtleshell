<?php
/**
 * Archive Member content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_directory_members_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_before_directory_members' ); ?>

	<?php if ( bp_has_members() ) : ?>

		<?php bp_get_template_part( 'members/pagination', 'members' ); ?>

		<?php bp_get_template_part( 'members/loop', 'members' ); ?>

		<?php bp_get_template_part( 'members/pagination', 'members' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'members/feedback', 'no-members' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_after_directory_members' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_directory_members_page' ); ?>
