<?php
/**
 * Pagination for blog pages
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_blogs_pagination_loop' ); ?>

<div class="bp-pagination">
	<div class="bp-pagination-count">

		<?php bp_blogs_pagination_count(); ?>

	</div>

	<div class="bp-pagination-links">

		<?php bp_blogs_pagination_links(); ?>

	</div>
</div>

<?php do_action( 'bp_template_after_blogs_pagination_loop' ); ?>
