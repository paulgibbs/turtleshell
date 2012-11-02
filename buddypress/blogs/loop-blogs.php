<?php
/**
 * Blogs loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_blogs_list' ); ?>

<ul class="bp-archive-blogs">

	<?php do_action( 'bp_template_before_blogs_loop' ); ?>

	<?php while ( bp_blogs() ) : bp_the_blog(); ?>

		<?php bp_get_template_part( 'blogs/loop-single-blog' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_template_after_blogs_loop' ); ?>

</ul><!-- .bp-archive-blogs -->

<?php do_action( 'bp_template_after_directory_blogs_list' ); ?>
