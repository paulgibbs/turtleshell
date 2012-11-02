<?php
/**
 * Groups loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_activity_list' ); ?>

<ul class="bp-archive-activity">

	<?php do_action( 'bp_template_before_activity_loop' ); ?>

	<?php while ( bp_activities() ) : bp_the_activity(); ?>

		<?php bp_get_template_part( 'activity/loop-single-activity' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_template_after_activity_loop' ); ?>

</ul><!-- .bp-archive-activity -->

<?php do_action( 'bp_template_after_directory_activity_list' ); ?>
