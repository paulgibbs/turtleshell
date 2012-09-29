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

			<div class="member-single">
				<div class="member-avatar avatar">
					<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
				</div>
				<div class="member-title item-title">
					<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
				</div>
				<div class="member-details item-details">
					<?php if ( bp_get_member_latest_update() ) : ?>
						<span class="member-update update"> <?php bp_member_latest_update(); ?></span>
					<?php endif; ?>
				<div class="member-meta item-meta">
					<span class="-member-activity activity"><?php bp_member_last_active(); ?></span>
				</div>
				<?php do_action( 'bp_directory_members_item' ); ?>
				</div>
				<div class="member-action item-action">
					<?php do_action( 'bp_directory_members_actions' ); ?>
				</div>
			</div>

	<?php do_action( 'bp_template_in_members_loop_late' ); ?>
</li>
