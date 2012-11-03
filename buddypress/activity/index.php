<?php
/**
 * Archive Activity content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_activity_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_template_before_directory_activity_content' ); ?>

	<?php if ( bp_has_activities() ) : ?>

		<?php do_action( 'template_notices' ); ?>

		<?php bp_get_template_part( 'activity/form-activity-search' ); ?>

		<?php bp_get_template_part( 'activity/pagination-activity' ); ?>

		<?php bp_get_template_part( 'activity/loop-activity' ); ?>

		<?php bp_get_template_part( 'activity/pagination-activity' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'activity/feedback-no-activity' ); ?>

		<?php bp_get_template_part( 'activity/form-activity-search' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_template_after_directory_activity_content' ); ?>
	
</div><!-- #buddypress -->

<?php do_action( 'bp_template_after_directory_activity_page' ); ?>