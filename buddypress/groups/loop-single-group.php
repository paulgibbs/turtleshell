<?php
/**
 * Single group template. Used in the group's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-group-<?php bp_group_id(); ?>" <?php bp_group_class(); ?>>
	<?php do_action( 'bp_template_in_groups_loop_early' ); ?>


	<?php do_action( 'bp_template_before_group_avatar' ); ?>

	<div class="group-avatar">
		<a href="<?php bp_group_permalink(); ?>"><?php bp_group_avatar(); ?></a>
	</div>

	<?php do_action( 'bp_template_after_group_avatar' ); ?>


	<?php do_action( 'bp_template_before_group_title' ); ?>

	<div class="group-title">
		<a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a>
	</div>

	<?php do_action( 'bp_template_after_group_title' ); ?>


	<?php do_action( 'bp_template_before_group_details' ); ?>

	<div class="group-details">
		<div class="group-meta">
			<span class="group-activity activity"><?php bp_group_last_active(); ?></span>
		</div>
	</div>

	<?php do_action( 'bp_template_after_group_details' ); ?>


	<?php do_action( 'bp_template_in_groups_loop_late' ); ?>
</li>
