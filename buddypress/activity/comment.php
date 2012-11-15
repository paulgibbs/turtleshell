<?php
/**
 * Single activity comment template. Used in the activity's loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<li id="acomment-<?php bp_activity_comment_id(); ?>">
	<?php do_action( 'bp_template_in_activity_comment_loop_early' ); ?>


	<?php do_action( 'bp_template_before_activity_comment_header' ); ?>

	<div class="acomment-header">
		<p class="acomment-header-label"><?php printf( __( 'Comment written by %s', 'buddypress' ), bp_get_activity_comment_name() ); ?></p>
		<?php printf( '<a href="%1$s">%2$s</a>', esc_url( bp_get_activity_comment_user_link() ), bp_get_activity_comment_name() ); ?>
	</div>

	<?php do_action( 'bp_template_after_activity_comment_header' ); ?>


	<?php do_action( 'bp_template_before_activity_comment_content' ); ?>

	<div class="acomment-body"><?php bp_activity_comment_content(); ?></div>

	<?php do_action( 'bp_template_after_activity_comment_content' ); ?>


	<?php if ( is_user_logged_in() && ( bp_activity_can_comment_reply( bp_activity_current_comment() ) || bp_activity_user_can_delete() ) ) : ?>

		<?php do_action( 'bp_template_before_activity_comment_actions' ); ?>

		<p class="acomment-actions-label"><?php _e( 'Respond to this comment', 'buddypress' ); ?></p>

		<ul class="acomment-actions">

			<?php if ( bp_activity_can_comment_reply( bp_activity_current_comment() ) ) : ?>
				<li><a href="#acomment-<?php bp_activity_comment_id(); ?>" class="reply"><?php _e( 'Reply', 'buddypress' ); ?></a></li>
			<?php endif; ?>

			<?php if ( bp_activity_user_can_delete() ) : ?>
				<li><a href="<?php bp_activity_comment_delete_link(); ?>" class="delete confirm" rel="nofollow"><?php _e( 'Delete', 'buddypress' ); ?></a></li>
			<?php endif; ?>

			<?php do_action( 'bp_template_in_activity_comment_actions' ); ?>

		</ul>

		<?php do_action( 'bp_template_after_activity_comment_actions' ); ?>
	<?php endif; ?>


	<?php bp_activity_recurse_comments( bp_activity_current_comment() ); ?>

	<?php do_action( 'bp_template_in_activity_comment_loop_late' ); ?>
</li>
