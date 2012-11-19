<?php
/**
 * Single member message/compose form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messages_compose_form' ); ?>

<form action="<?php bp_messages_form_action( 'compose' ); ?>" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_messages_compose_form_extras_top' ); ?>

	<fieldset>
		<legend><?php _e( 'Message recipients', 'buddypress' ); ?></legend>

		<label for="send-to-input"><?php _e( 'Send a message to a friend:', 'buddypress' ); ?></label>	
		<ul>
			<li>
				<?php bp_message_get_recipient_tabs(); ?>
				<input type="text" name="send-to-input" id="send-to-input" autofocus />
			</li>
		</ul>

		<?php if ( bp_current_user_can( 'bp_moderate' ) ) : ?>
			<input type="checkbox" id="bp-send-notice" name="send-notice" value="1" /><?php _e( 'This is a notice that needs to be sent to all users.', 'buddypress' ); ?>
		<?php endif; ?>
	</fieldset>

	<fieldset>
		<legend><?php _e( 'Message contents', 'buddypress' ); ?></legend>

		<label for="subject"><?php _e( 'Subject', 'buddypress'); ?></label>
		<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value(); ?>" />

		<label for="message_content"><?php _e( 'Message', 'buddypress'); ?></label>
		<textarea name="content" id="message_content"><?php bp_messages_content_value(); ?></textarea>
	</fieldset>

	<input type="hidden" name="send_to_usernames" value="<?php echo esc_attr( bp_get_message_get_recipient_usernames() ); ?>" />
	<input type="submit" value="<?php esc_attr_e( 'Send Message', 'buddypress' ); ?>" class="submit" />

	<?php wp_nonce_field( 'messages_send_message' ); ?>

	<?php do_action( 'bp_template_member_messages_compose_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_messages_compose_form' ); ?>
