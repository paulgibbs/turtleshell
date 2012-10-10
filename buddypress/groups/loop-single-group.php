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


	<div class="group-details">

		<?php do_action( 'bp_template_before_group_title' ); ?>

		<div class="group-title">
			<a href="<?php bp_group_permalink(); ?>"><?php bp_group_name(); ?></a>
		</div>

		<?php do_action( 'bp_template_after_group_title' ); ?>


		<?php do_action( 'bp_template_before_group_meta' ); ?>

		<div class="group-meta">
			<ul>
				<li class="group-activity"><?php bp_group_last_active(); ?></li>
				<li class="group-member-count"><?php bp_group_member_count(); ?></li>
				<li class="group-action"><?php bp_group_join_button(); ?></li>

				<?php do_action( 'bp_template_in_group_meta' ); ?>
			</ul>
		</div>

		<?php do_action( 'bp_template_after_group_meta' ); ?>

	</div><!-- .group-details -->


	<?php do_action( 'bp_template_before_group_description' ); ?>

	<div class="group-description"><?php bp_group_description_excerpt(); ?></div>

	<?php do_action( 'bp_template_after_group_description' ); ?>


	<?php do_action( 'bp_template_in_groups_loop_late' ); ?>
</li>
