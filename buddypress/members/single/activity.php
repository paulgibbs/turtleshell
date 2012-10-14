<?php
/**
 * Single member activity template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_member_activity_content' ); ?>

<?php if ( bp_has_activities() ) : ?>

	<?php bp_get_template_part( 'activity/pagination', 'activity' ); ?>

	<?php bp_get_template_part( 'activity/loop', 'activity' ); ?>

	<?php bp_get_template_part( 'activity/pagination', 'activity' ); ?>

<?php else : ?>

	<?php bp_get_template_part( 'activity/feedback', 'no-activity' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_member_activity_content' ); ?>
