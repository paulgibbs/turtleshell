<?php
/**
 * Single member template. Used in the member's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-member-<?php bp_member_user_id(); ?>" <?php bp_member_class(); ?>>
	<?php do_action( 'bp_template_in_members_loop_early' ); ?>


	<?php do_action( 'bp_template_before_member_avatar' ); ?>

	<div class="member-avatar">
		<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar( 'type=full' ); ?></a>
	</div>

	<?php do_action( 'bp_template_after_member_avatar' ); ?>


	<?php do_action( 'bp_template_before_member_title' ); ?>

	<div class="member-title">
		<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
	</div>

	<?php do_action( 'bp_template_after_member_title' ); ?>


	<?php do_action( 'bp_template_before_member_details' ); ?>

	<div class="member-details">

		<?php if ( bp_is_user_friends() && bp_is_current_action( 'requests' ) ) : ?>

			<div class="generic-button is_pending">
				<a href="<?php bp_friend_reject_request_link(); ?>" title="Reject Friendship" class="button is_pending reject"><?php _e( 'Reject', 'buddypress' ); ?></a>
			</div>

			<div class="generic-button is_pending">
				<a href="<?php bp_friend_accept_request_link(); ?>" title="Accept Friendship" class="button is_pending accept"><?php _e( 'Accept', 'buddypress' ); ?></a>
			</div>

		<?php elseif ( bp_is_user_friends() ) : ?>

			<?php bp_add_friend_button( bp_get_member_user_id() ); ?>

		<?php endif; ?>

		<?php do_action( 'bp_template_in_member_details' ); ?>

	</div>

	<?php do_action( 'bp_template_after_member_details' ); ?>


	<?php do_action( 'bp_template_in_members_loop_late' ); ?>
</li>
