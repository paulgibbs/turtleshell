<?php
/**
 * Single activity template. Used in the activity's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-activity-<?php bp_activity_id(); ?>" <?php bp_activity_css_class(); ?>>
	<?php do_action( 'bp_template_in_activity_loop_early' ); ?>

	<div class="activity-avatar">
		<a href="<?php bp_activity_user_link(); ?>">
			<?php bp_activity_avatar(); ?>
		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">
			<?php bp_activity_action(); ?>
		</div>

		<?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>
			<span class="activity-inreply">
				<?php _e( 'In reply to: ', 'buddypress' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" class="view" title="<?php _e( 'View Thread / Permalink', 'buddypress' ); ?>"><?php _e( 'View', 'buddypress' ); ?></a>
			</span>
		<?php endif; ?>

		<?php if ( bp_activity_has_content() ) : ?>
			<div class="activity-body">
				<?php bp_activity_content_body(); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_user_logged_in() ) : ?>
			<div class="activity-meta">
				<?php if ( bp_activity_can_comment() ) : ?>
					<span class="activity-comment">
						<a href="<?php bp_get_activity_comment_link(); ?>" class="button acomment-reply bp-primary-action" id="acomment-comment-<?php bp_activity_id(); ?>"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a>
					</span>
				<?php endif; ?>

				<?php if ( bp_activity_can_favorite() ) : ?>
					<?php if ( !bp_get_activity_is_favorite() ) : ?>
					<span class="activity-favorite">
						<a href="<?php bp_activity_favorite_link(); ?>" class="button fav bp-secondary-action" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>
					</span>
					<?php else : ?>
					<span class="activity-unfavorite">
						<a href="<?php bp_activity_unfavorite_link(); ?>" class="button unfav bp-secondary-action" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>
					</span>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ( bp_activity_user_can_delete() ) : ?>
					<span class="activity-delete">
						<?php bp_activity_delete_link(); ?>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div><!-- .activity-content -->


	<?php do_action( 'bp_template_in_activity_loop_late' ); ?>
</li>
