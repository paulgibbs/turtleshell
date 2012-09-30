<?php
/**
 * Pagination for group pages
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_groups_pagination_loop' ); ?>

<div class="bp-pagination">
	<div class="bp-pagination-count">

		<?php bp_groups_pagination_count(); ?>

	</div>

	<div class="bp-pagination-links">

		<?php bp_groups_pagination_links(); ?>

	</div>
</div>

<?php do_action( 'bp_template_after_groups_pagination_loop' ); ?>
