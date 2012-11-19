<?php
/**
 * Single member message/reply form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messages_reply_form' ); ?>

<form action="<?php bp_messages_form_action(); ?>" method="post" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_messages_reply_form_extras_top' ); ?>

	<label for="message_content"><?php _e( 'Reply to this conversation:', 'buddypress' ); ?>
	<textarea name="content" id="message_content"></textarea>

	<input type="submit" name="send" value="<?php esc_attr_e( 'Send Reply', 'buddypress' ); ?>" class="message-submit" />

	<input type="hidden" name="thread_id" value="<?php bp_the_thread_id(); ?>" />
	<input type="hidden" name="messages_order" value="<?php bp_thread_messages_order(); ?>" />
	<?php wp_nonce_field( 'messages_send_message', 'send_message_nonce' ); ?>

	<?php do_action( 'bp_template_member_messages_reply_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_messages_reply_form' ); ?>
