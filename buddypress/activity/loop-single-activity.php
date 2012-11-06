<?php
/**
 * Single activity template. Used in the activity's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="bp-activity-<?php bp_activity_id(); ?>" class="<?php echo esc_attr( bp_get_activity_css_class() ); ?>">
	<?php do_action( 'bp_template_in_activity_loop_early' ); ?>


	<div class="activity-avatar">
		<a href="<?php bp_activity_user_link(); ?>">
			<?php bp_activity_avatar(); ?>
		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">
			<?php bp_activity_action( 'no_timestamp=1' ); ?>
		</div>

		<?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>
			<span class="activity-inreply">
				<?php _e( 'In reply to: ', 'buddypress' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" title="<?php _e( 'View Thread / Permalink', 'buddypress' ); ?>"><?php _e( 'View', 'buddypress' ); ?></a>
			</span>
		<?php endif; ?>

		<?php if ( bp_activity_has_content() ) : ?>
			<div class="activity-body">
				<?php bp_activity_content_body(); ?>
			</div>
		<?php endif; ?>

		<div class="activity-meta">
			<div class="activity-timestamp">
				<a href="<?php bp_activity_thread_permalink(); ?>"><?php echo bp_core_time_since( bp_get_activity_date_recorded() ); ?></a>
			</div>

			<?php if ( is_user_logged_in() ) : ?>
				<ul class="activity-actions">

					<?php if ( bp_activity_can_comment() ) : ?>
						<li><a href="<?php bp_get_activity_comment_link(); ?>" class="has-count"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a></li>
					<?php endif; ?>

					<?php if ( bp_activity_can_favorite() ) : ?>
						<li>

							<?php if ( !bp_get_activity_is_favorite() ) : ?>
								<a href="<?php bp_activity_favorite_link(); ?>" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>
							<?php else : ?>
								<a href="<?php bp_activity_unfavorite_link(); ?>" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>
							<?php endif; ?>

						</li>
					<?php endif; ?>

					<?php if ( bp_activity_user_can_delete() ) : ?>
						<li><?php bp_activity_delete_link(); ?></li>
					<?php endif; ?>

				</ul>
			<?php endif; ?>

		</div><!-- .activity-meta -->
	</div><!-- .activity-content -->

	<?php if ( ( is_user_logged_in() && bp_activity_can_comment() ) || bp_activity_get_comment_count() ) : ?>
		<div class="activity-comments">
			<?php bp_activity_comments(); ?>
		</div>
	<?php endif; ?>


	<?php do_action( 'bp_template_in_activity_loop_late' ); ?>
</li>
