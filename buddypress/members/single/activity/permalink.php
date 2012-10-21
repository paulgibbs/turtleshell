<?php
/**
 * Activity Permalink
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_single_activity' ); ?>

<div id="buddypress">

	<?php do_action( 'template_notices' ); ?>

	<?php if ( bp_has_activities( 'display_comments=threaded&show_hidden=true&include=' . bp_current_action() ) ) : ?>

		<ul class="bp-archive-activity bp-single-activity">
		
		<?php while ( bp_activities() ) : bp_the_activity(); ?>
		
			<?php do_action( 'bp_template_before_activity_entry' ); ?>

			<?php bp_get_template_part( 'activity/loop', 'single-activity' ); ?>
			
			<?php do_action( 'bp_template_after_activity_entry' ); ?>
		
		<?php endwhile; ?>
		
		</ul><!-- .bp-archive-activity -->

	<?php endif; ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_template_after_single_activity' ); ?>