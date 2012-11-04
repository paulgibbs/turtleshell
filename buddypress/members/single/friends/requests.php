<?php
/**
 * Single member friends template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_friend_requests_content' ); ?>

<?php if ( bp_has_members( 'type=alphabetical&include=' . bp_get_friendship_requests() ) ) : ?>

	<?php bp_get_template_part( 'members/pagination-members' ); ?>

	<?php bp_get_template_part( 'members/loop-members' ); ?>

	<?php bp_get_template_part( 'members/pagination-members' ); ?>

<?php else : ?>

	<?php bp_get_template_part( 'members/single/friends/feedback-no-friend-requests' ); ?>

<?php endif; ?>

<?php do_action( 'bp_template_after_member_friend_requests_content' ); ?>
