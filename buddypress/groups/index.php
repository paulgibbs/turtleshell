<?php
/**
 * Archive Group content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_directory_groups_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_before_directory_groups' ); ?>

	<?php if ( bp_has_groups() ) : ?>

		<?php bp_get_template_part( 'groups/pagination', 'groups' ); ?>

		<?php bp_get_template_part( 'groups/loop', 'groups' ); ?>

		<?php bp_get_template_part( 'groups/pagination', 'groups' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'groups/feedback', 'no-groups' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_after_directory_groups' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_directory_groups_page' ); ?>
