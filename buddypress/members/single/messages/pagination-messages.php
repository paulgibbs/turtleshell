<?php
/**
 * Messages pagination content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="pagination no-ajax" id="user-pag">

	<div class="pag-count" id="messages-dir-count">
		<?php bp_messages_pagination_count(); ?>
	</div>

	<div class="pagination-links" id="messages-dir-pag">
		<?php bp_messages_pagination(); ?>
	</div>

</div><!-- .pagination -->
