<?php
/**
 * Pagination for member messages
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messags_pagination_loop' ); ?>

<div class="bp-pagination">
	<div class="bp-pagination-count">

		<?php bp_messages_pagination_count(); ?>

	</div>

	<div class="bp-pagination-links">

		<?php bp_messages_pagination(); ?>

	</div>
</div>

<?php do_action( 'bp_template_after_member_messags_pagination_loop' ); ?>
