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

	<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>

	<?php do_action( 'bp_template_after_member_avatar' ); ?>


	<?php do_action( 'bp_template_before_member_name' ); ?>

	<a href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>

	<?php do_action( 'bp_template_after_member_name' ); ?>


	<?php do_action( 'bp_directory_members_item' );     // Backpat ?>
	<?php do_action( 'bp_directory_members_actions' );  // Backpat ?>

	<?php do_action( 'bp_template_in_members_loop_late' ); ?>
</li>
