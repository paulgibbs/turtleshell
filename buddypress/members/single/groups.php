<?php
/**
 * Single member group template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_member_groups_content' ); ?>

<?php if ( bp_has_groups() ) : ?>

	<?php bp_get_template_part( 'groups/pagination', 'groups' ); ?>

	<?php bp_get_template_part( 'groups/loop', 'groups' ); ?>

	<?php bp_get_template_part( 'groups/pagination', 'groups' ); ?>

<?php else : ?>

	<?php bp_get_template_part( 'groups/feedback', 'no-groups' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_member_groups_content' ); ?>
