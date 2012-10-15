<?php
/**
 * Activity Permalink
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_activity_entry' ); ?>

<div id="buddypress">

	<?php if ( bp_has_activities() ) : ?>

		<ul class="bp-archive-activity">
		<?php while ( bp_activities() ) : bp_the_activity(); ?>

			<?php bp_get_template_part( 'activity/loop', 'single-activity' ); ?>
		
		<?php endwhile; ?>
		</ul>

	<?php endif; ?>

</div><!-- #buddypress -->