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


	<div class="blog-author-avatar">
		<?php bp_blog_avatar( array( 'height' => BP_AVATAR_THUMB_HEIGHT/2, 'width' => BP_AVATAR_THUMB_WIDTH/2 ) ); ?>
	</div>

	<div class="blog-content">
		<h3 class="blog-title">
			<a href="<?php echo esc_url( bp_get_blog_latest_post_permalink() ); ?>"><?php bp_blog_latest_post_title(); ?></a><br />
			<span class="blog-name"><a href="<?php echo esc_url( bp_get_blog_permalink() ); ?>"><?php bp_blog_name(); ?></a></span>
		</h3>

		<?php if ( bp_blog_latest_post_has_featured_image( 'post-thumbnail' ) ) : ?>
			<a href="<?php echo esc_url( bp_get_blog_latest_post_permalink() ); ?>">
				<img class="blog-image" src="<?php echo esc_url( bp_get_blog_latest_post_featured_image( 'post-thumbnail' ) ); ?>" alt="<?php echo esc_attr( bp_get_blog_latest_post_title() ); ?>" ?>
			</a>
		<?php endif; ?>

		<p class="blog-excerpt">
			<?php echo bp_create_excerpt( bp_get_blog_latest_post_content(), 500 ); ?>
		</p>
	</div>


	<?php do_action( 'bp_template_in_blogs_loop_late' ); ?>
</li>
