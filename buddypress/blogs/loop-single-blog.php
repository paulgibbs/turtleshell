<?php
/**
 * Single blog template. Used in the blog's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-blog-<?php bp_blog_id(); ?>" <?php bp_blog_class(); ?>>
	<?php do_action( 'bp_template_in_blogs_loop_early' ); ?>


	<?php do_action( 'bp_template_before_blog_avatar' ); ?>

	<div class="blog-author-avatar">
		<?php bp_blog_avatar( 'type=thumb' ); ?>
	</div>


	<?php do_action( 'bp_template_before_blog_content' ); ?>

	<div class="blog-content">

		<?php do_action( 'bp_template_before_blog_title' ); ?>

		<h3 class="blog-title">
			<a href="<?php echo esc_url( bp_get_blog_latest_post_permalink() ); ?>"><?php bp_blog_latest_post_title(); ?></a><br />
			<span class="blog-name"><a href="<?php echo esc_url( bp_get_blog_permalink() ); ?>"><?php bp_blog_name(); ?></a></span>
		</h3>


		<?php do_action( 'bp_template_before_blog_featured_image' ); ?>

		<?php if ( bp_blog_latest_post_has_featured_image( 'post-thumbnail' ) ) : ?>
			<a href="<?php echo esc_url( bp_get_blog_latest_post_permalink() ); ?>">
				<img class="blog-image" src="<?php echo esc_url( bp_get_blog_latest_post_featured_image( 'post-thumbnail' ) ); ?>" alt="<?php echo esc_attr( bp_get_blog_latest_post_title() ); ?>" ?>
			</a>
		<?php endif; ?>


		<?php do_action( 'bp_template_before_blog_excerpt' ); ?>

		<p class="blog-excerpt">
			<?php echo bp_create_excerpt( bp_get_blog_latest_post_content(), 500 ); ?>
		</p>

		<?php do_action( 'bp_template_after_blog_excerpt' ); ?>

	</div>


	<?php do_action( 'bp_template_in_blogs_loop_late' ); ?>
</li>
