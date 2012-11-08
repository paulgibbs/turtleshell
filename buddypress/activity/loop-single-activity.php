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


	<?php do_action( 'bp_template_before_activity_avatar' ); ?>

	<div class="activity-avatar">
		<a href="<?php bp_activity_user_link(); ?>">
			<?php bp_activity_avatar(); ?>
		</a>
	</div>

	<?php do_action( 'bp_template_after_activity_avatar' ); ?>


	<?php do_action( 'bp_template_before_activity_content' ); ?>

	<div class="activity-content">

		<?php do_action( 'bp_template_before_activity_header' ); ?>

		<div class="activity-header">
			<?php bp_activity_action( 'no_timestamp=1' ); ?>
		</div>

		<?php do_action( 'bp_template_after_activity_header' ); ?>


		<?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>
			<span class="activity-inreply">
				<?php _e( 'In reply to: ', 'buddypress' ); ?></strong><?php bp_activity_parent_content(); ?> <a href="<?php bp_activity_thread_permalink(); ?>" title="<?php _e( 'View Thread / Permalink', 'buddypress' ); ?>"><?php _e( 'View', 'buddypress' ); ?></a>
			</span>
		<?php endif; ?>


		<?php if ( bp_activity_has_content() ) : ?>
			<?php do_action( 'bp_template_before_activity_body' ); ?>

			<div class="activity-body">
				<?php bp_activity_content_body(); ?>
			</div>

			<?php do_action( 'bp_template_after_activity_body' ); ?>
		<?php endif; ?>


		<?php do_action( 'bp_template_before_activity_meta' ); ?>

		<div class="activity-meta">

			<?php do_action( 'bp_template_before_activity_timestamp' ); ?>

			<div class="activity-timestamp">
				<a href="<?php bp_activity_thread_permalink(); ?>"><?php echo bp_core_time_since( bp_get_activity_date_recorded() ); ?></a>
			</div>

			<?php do_action( 'bp_template_after_activity_timestamp' ); ?>


			<?php if ( is_user_logged_in() ) : ?>
				<?php do_action( 'bp_template_before_activity_actions' ); ?>

				<ul class="activity-actions">

					<?php if ( bp_activity_can_comment() ) : ?>
						<li><a href="<?php bp_get_activity_comment_link(); ?>" class="has-count"><?php printf( __( 'Comment <span>%s</span>', 'buddypress' ), bp_activity_get_comment_count() ); ?></a></li>
					<?php endif; ?>

					<?php if ( bp_activity_can_favorite() ) : ?>
						<li>

							<?php if ( ! bp_get_activity_is_favorite() ) : ?>
								<a href="<?php bp_activity_favorite_link(); ?>" title="<?php esc_attr_e( 'Mark as Favorite', 'buddypress' ); ?>"><?php _e( 'Favorite', 'buddypress' ); ?></a>
							<?php else : ?>
								<a href="<?php bp_activity_unfavorite_link(); ?>" title="<?php esc_attr_e( 'Remove Favorite', 'buddypress' ); ?>"><?php _e( 'Remove Favorite', 'buddypress' ); ?></a>
							<?php endif; ?>

						</li>
					<?php endif; ?>

					<?php if ( bp_activity_user_can_delete() ) : ?>
						<li><?php bp_activity_delete_link(); ?></li>
					<?php endif; ?>

					<?php do_action( 'bp_template_in_activity_actions' ); ?>
				</ul>

				<?php do_action( 'bp_template_after_activity_actions' ); ?>
			<?php endif; ?>

		</div><!-- .activity-meta -->

		<?php do_action( 'bp_template_after_activity_meta' ); ?>

	</div><!-- .activity-content -->

	<?php do_action( 'bp_template_after_activity_content' ); ?>


	<?php if ( bp_activity_get_comment_count() ) : ?>
		<?php do_action( 'bp_template_before_activity_comments' ); ?>

		<div class="activity-comments">

			<?php do_action( 'bp_template_before_activity_comments_avatars' ); ?>

			<p class="acomment-avatar-label"><?php printf( _n( 'There is %s voice in this conversation &nbsp;', 'There are %s voices in this conversation &nbsp;', count( bp_activity_get_comments_user_ids() ), 'buddypress' ), number_format_i18n( count( bp_activity_get_comments_user_ids() ) ) ); ?></p>
			<ul class="acomment-avatars">
				<?php bp_activity_comments_user_avatars(); ?>
			</ul>

			<?php do_action( 'bp_template_after_activity_comments_avatars' ); ?>
			<?php bp_activity_comments(); ?>

		</div>

		<?php do_action( 'bp_template_after_activity_comments' ); ?>
	<?php endif; ?>


	<?php do_action( 'bp_template_in_activity_loop_late' ); ?>
</li>
