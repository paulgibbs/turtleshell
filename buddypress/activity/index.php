<?php
/**
 * Archive Activity content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>
<?php do_action( 'bp_before_directory_activity' ); ?>
<div id="buddypress">
	<?php do_action( 'bp_before_directory_activity_content' ); ?>
	<?php do_action( 'template_notices' ); ?>
	<?php do_action( 'bp_before_directory_activity_list' ); ?>
	<div class="bp-activity">
		<?php bp_get_template_part( 'activity/loop', 'activity' ); ?>
	</div>
	<?php do_action( 'bp_after_directory_activity_list' ); ?>
	<?php do_action( 'bp_directory_activity_content' ); ?>
	<?php do_action( 'bp_after_directory_activity_content' ); ?>
	<?php do_action( 'bp_after_directory_activity' ); ?>
</div>