<?php
/**
 * Single member message/compose form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<form action="<?php bp_messages_form_action('compose'); ?>" method="post" id="send_message_form" class="standard-form" role="main" enctype="multipart/form-data">

	<?php do_action( 'bp_template_before_messages_compose_content' ); ?>

	<div class="message-to">
		<label for="send-to-input"><?php _e("Send To (Username or Friend's Name)", 'buddypress'); ?></label>
		
		<ul class="first acfb-holder">
		<li>
			<?php bp_message_get_recipient_tabs(); ?>
			<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" autofocus />
		</li>
		</ul>
	</div><!-- .message-to -->

	<?php if ( bp_current_user_can( 'bp_moderate' ) ) : ?>
	<div class="message-all-notice">
		<input type="checkbox" id="send-notice" name="send-notice" value="1" /> <?php _e( "This is a notice to all users.", "buddypress" ); ?>
	</div>
	<?php endif; ?>
	
	<div class="message-subject">
		<label for="subject"><?php _e( 'Subject', 'buddypress'); ?></label>
		<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value(); ?>" />
	</div><!-- .message-all-notice -->
	
	<div class="message-content">
		<label for="content"><?php _e( 'Message', 'buddypress'); ?></label>
		<textarea name="content" id="message_content" rows="15" cols="40"><?php bp_messages_content_value(); ?></textarea>
	</div><!-- .message-content -->

	<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

	<?php do_action( 'bp_template_after_messages_compose_content' ); ?>

	<div class="message-submit">
		<input type="submit" value="<?php _e( "Send Message", 'buddypress' ); ?>" name="send" id="send" />
	</div>

	<?php wp_nonce_field( 'messages_send_message' ); ?>
</form><!-- #send-message-form -->