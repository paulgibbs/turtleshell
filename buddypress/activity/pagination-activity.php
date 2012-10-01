<?php
/**
 * Pagination for activity pages
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_activity_pagination_loop' ); ?>

<div class="bp-pagination">
	<div class="bp-pagination-count">

		<?php bp_activity_pagination_count(); ?>

	</div>

	<div class="bp-pagination-links">

		<?php bp_activity_pagination_links(); ?>

	</div>
</div>

<?php do_action( 'bp_template_after_activity_pagination_loop' ); ?>