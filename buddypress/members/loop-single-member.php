<?php
/**
 * Single member template. Used in the member's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-member-<?php bp_member_user_id(); ?>" <?php //@todo: bp_member_class(); ?>>
	<?php do_action( 'bp_template_in_members_loop_early' ); ?>


	<?php do_action( 'bp_template_before_member_avatar' ); ?>

	<div class="member-avatar">
		<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
	</div>

	<?php do_action( 'bp_template_after_member_avatar' ); ?>


	<?php do_action( 'bp_template_before_member_title' ); ?>

	<div class="member-title">
		<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
	</div>

	<?php do_action( 'bp_template_after_member_title' ); ?>


	<?php do_action( 'bp_template_before_member_details' ); ?>

	<div class="member-details">
		<div class="member-meta">
			<span class="member-activity activity"><?php bp_member_last_active(); ?></span>
		</div>
	</div>

	<?php do_action( 'bp_template_after_member_details' ); ?>


	<?php do_action( 'bp_template_in_members_loop_late' ); ?>
</li>
