<?php
/**
 * Archive Member content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_members_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_template_before_directory_members_content' ); ?>

	<?php if ( bp_has_members() ) : ?>

		<?php do_action( 'template_notices' ); ?>

		<?php bp_get_template_part( 'members/form-members-search' ); ?>

		<?php bp_get_template_part( 'members/pagination-members' ); ?>

		<?php bp_get_template_part( 'members/loop-members' ); ?>

		<?php bp_get_template_part( 'members/pagination-members' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'members/feedback-no-members' ); ?>

		<?php bp_get_template_part( 'members/form-members-search' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_template_after_directory_members_content' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_template_after_directory_members_page' ); ?>
