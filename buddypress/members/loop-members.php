<?php
/**
 * Members loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_directory_members_list' ); ?>

<ul id="bp-archive-members">

	<?php do_action( 'bp_template_before_members_loop' ); ?>

	<?php while ( bp_members() ) : bp_the_member(); ?>

		<?php bp_get_template_part( 'members/loop', 'single-member' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_template_after_members_loop' ); ?>

</ul><!-- #bp-archive-members -->

<?php do_action( 'bp_after_directory_members_list' ); ?>
