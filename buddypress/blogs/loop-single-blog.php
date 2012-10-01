<?php
/**
 * Single blog template. Used in the blog's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-blog-<?php bp_blog_id(); ?>" <?php //@todo: bp_blog_class(); ?>>
	<?php do_action( 'bp_template_in_blogs_loop_early' ); ?>
	<?php do_action( 'bp_template_in_blogs_loop_late' ); ?>
</li>
