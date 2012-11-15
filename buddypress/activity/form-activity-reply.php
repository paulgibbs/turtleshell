<?php
/**
 * Activity comment/reply to form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>

	<?php do_action( 'bp_template_before_activity_reply_form' ); ?>

	<form action="<?php bp_activity_comment_form_action(); ?>" method="post" class="activity-reply-form" id="ac-form-<?php bp_activity_id(); ?>" enctype="multipart/form-data" <?php bp_activity_comment_form_nojs_display(); ?>>

		<?php do_action( 'bp_template_activity_reply_form_extras_top' ); ?>

		<label for="ac-input-<?php bp_activity_id(); ?>"><?php _e( 'Join the discussion', 'buddypress' ); ?></label>

		<textarea id="ac-input-<?php bp_activity_id(); ?>" name="ac_input_<?php bp_activity_id(); ?>" autofocus></textarea>
		<input type="submit" name="ac_form_submit" value="<?php esc_attr_e( 'Post', 'buddypress' ); ?>" />
		<input type="hidden" name="comment_form_id" value="<?php echo esc_attr( bp_activity_id() ); ?>" />
		<?php wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment' ); ?>

		<?php do_action( 'bp_template_activity_search_form_extras_bottom' ); ?>

	</form>

	<?php do_action( 'bp_template_after_activity_reply_form' ); ?>

<?php endif; ?>
