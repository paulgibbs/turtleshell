<?php
/**
 * Activity Permalink
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div id="buddypress">

	<?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

		<ul class="bp-archive-activity">
		
		<?php while ( bp_activities() ) : bp_the_activity(); ?>
		
			<?php do_action( 'bp_before_activity_entry' ); ?>

			<?php bp_get_template_part( 'activity/loop', 'single-activity' ); ?>
			
			<?php do_action( 'bp_after_activity_entry' ); ?>
		
		<?php endwhile; ?>
		
		</ul><!-- .bp-archive-activity -->

	<?php endif; ?>

</div><!-- #buddypress -->

