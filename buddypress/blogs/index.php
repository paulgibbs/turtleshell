<?php
/**
 * Archive Blog content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_blogs_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_template_before_directory_blogs_content' ); ?>

	<?php if ( bp_has_blogs() ) : ?>

		<?php do_action( 'template_notices' ); ?>

		<?php bp_get_template_part( 'blogs/pagination-blogs' ); ?>

		<?php bp_get_template_part( 'blogs/loop-blogs' ); ?>

		<?php bp_get_template_part( 'blogs/pagination-blogs' ); ?>

	<?php else : ?>

		<?php bp_get_template_part( 'blogs/feedback-no-blogs' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_template_after_directory_blogs_content' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_template_after_directory_blogs_page' ); ?>
