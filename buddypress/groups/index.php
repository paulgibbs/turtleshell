<?php
/**
 * Archive Group content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_groups_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_template_before_directory_groups_content' ); ?>

	<?php if ( bp_has_groups( 'type=alphabetical' ) ) : ?>

		<?php do_action( 'template_notices' ); ?>

		<?php bp_get_template_part( 'groups/form-groups-search' ); ?>

		<?php bp_get_template_part( 'groups/pagination-groups' ); ?>

		<?php bp_get_template_part( 'groups/loop-groups' ); ?>

		<?php bp_get_template_part( 'groups/pagination-groups' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'groups/form-groups-search' ); ?>

		<?php bp_get_template_part( 'groups/feedback-no-groups' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_template_after_directory_groups_content' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_template_after_directory_groups_page' ); ?>
