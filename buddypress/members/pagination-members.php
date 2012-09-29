<?php
/**
 * Pagination for member pages
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_members_pagination_loop' ); ?>

<div class="bp-pagination">
	<div class="bp-pagination-count">

		<?php bp_members_pagination_count(); ?>

	</div>

	<div class="bp-pagination-links">

		<?php bp_members_pagination_links(); ?>

	</div>
</div>

<?php do_action( 'bp_template_after_members_pagination_loop' ); ?>
