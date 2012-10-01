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
	<?php if ( is_user_logged_in() ) : ?>
		<?php //bp_get_template_part( 'activity/post-form' ); ?>
	<?php endif; ?>
	<?php do_action( 'template_notices' ); ?>
	<?php // this will be broked bp_get_template_part( 'activity/filter', 'activity' ); ?>
	<?php do_action( 'bp_before_directory_activity_list' ); ?>
	<div class="bp-activity">
		<?php bp_get_template_part( 'activity/loop', 'activity' ); ?>
	</div>
	<?php do_action( 'bp_after_directory_activity_list' ); ?>
	<?php do_action( 'bp_directory_activity_content' ); ?>
	<?php do_action( 'bp_after_directory_activity_content' ); ?>
	<?php do_action( 'bp_after_directory_activity' ); ?>
</div>