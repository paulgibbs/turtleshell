<?php
/**
 * Groups loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_directory_activity_list' ); ?>

<ul class="bp-archive-activity">

	<?php do_action( 'bp_before_activity_loop' ); ?>

	<?php while ( bp_has_activities() ) : bp_the_activity(); ?>

		<?php bp_get_template_part( 'activity/loop', 'single-activity' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_after_activity_loop' ); ?>

</ul><!-- .bp-archive-activity -->

<?php do_action( 'bp_after_directory_activity_list' ); ?>
