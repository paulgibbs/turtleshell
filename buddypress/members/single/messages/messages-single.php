<?php
/**
 * Messages single message content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php bp_get_template_part( 'members/single/messages/messages-search', 'messages' ); ?>

<div id="message-thread" role="main">

	<?php do_action( 'bp_template_before_message_thread_content' ); ?>

	<?php if ( bp_thread_has_messages() ) : ?>

		<div class="message-header">
			<h4 class="message-title"><?php bp_the_thread_subject(); ?></h4>
		</div><!-- .message-header -->

		<div id="message-recipients">
			<span class="thread-highlight">

				<?php if ( !bp_get_the_thread_recipients() ) : ?>

					<?php _e( 'You are alone in this conversation.', 'buddypress' ); ?>

				<?php else : ?>

					<?php printf( __( 'Conversation between %s and you.', 'buddypress' ), bp_get_the_thread_recipients() ); ?>

				<?php endif; ?>

			</span><!-- .highlight -->
			
			<span class="thread-delete"><a class="button confirm" href="<?php bp_the_thread_delete_link(); ?>" title="<?php _e( "Delete Message", "buddypress" ); ?>"><?php _e( 'Delete', 'buddypress' ); ?></a></span>
			
			
			
		</div><!-- #message-recipients -->

		<?php do_action( 'bp_template_before_message_thread_list' ); ?>
		
		<div id="messages-box">

		<?php while ( bp_thread_messages() ) : bp_thread_the_message(); ?>

			<div class="message-body <?php bp_the_thread_message_alt_class(); ?>">

				<div class="message-metadata">

					<?php do_action( 'bp_before_message_meta' ); ?>

					<?php bp_the_thread_message_sender_avatar( 'type=thumb&width=30&height=30' ); ?>
					<a href="<?php bp_the_thread_message_sender_link(); ?>" title="<?php bp_the_thread_message_sender_name(); ?>"><?php bp_the_thread_message_sender_name(); ?></a> <span class="activity"><?php bp_the_thread_message_time_since(); ?></span>

					<?php do_action( 'bp_after_message_meta' ); ?>

				</div><!-- .message-metadata -->

				<?php do_action( 'bp_template_before_message_content' ); ?>

				<div class="message-content">

					<?php bp_the_thread_message_content(); ?>

				</div><!-- .message-content -->

				<?php do_action( 'bp_template_after_message_content' ); ?>

			</div><!-- .message-box -->

		<?php endwhile; ?>
		
		</div>

		<?php do_action( 'bp_template_after_message_thread_list' ); ?>

		<?php do_action( 'bp_template_before_message_thread_reply' ); ?>

		<form id="send-reply" action="<?php bp_messages_form_action(); ?>" method="post" class="standard-form" enctype="multipart/form-data">

			<div class="message-box-reply">
			
				<div class="message-metadata">

					<?php do_action( 'bp_template_before_message_meta' ); ?>

					<div class="avatar-box">
						<?php bp_loggedin_user_avatar( 'type=thumb&height=30&width=30' ); ?>

						<strong><?php _e( 'Send a Reply', 'buddypress' ); ?></strong>
					</div>

					<?php do_action( 'bp_template_after_message_meta' ); ?>

				</div><!-- .message-metadata -->

				<div class="message-content">

					<?php do_action( 'bp_template_before_message_reply_box' ); ?>

					<textarea name="content" id="message_content" rows="15" cols="40"></textarea>

					<?php do_action( 'bp_template_after_message_reply_box' ); ?>

					<div class="submit">
						<input type="submit" name="send" value="<?php _e( 'Send Reply', 'buddypress' ); ?>" id="send_reply_button"/>
					</div>

					<input type="hidden" id="thread_id" name="thread_id" value="<?php bp_the_thread_id(); ?>" />
					<input type="hidden" id="messages_order" name="messages_order" value="<?php bp_thread_messages_order(); ?>" />
					<?php wp_nonce_field( 'messages_send_message', 'send_message_nonce' ); ?>

				</div><!-- .message-content -->

			</div><!-- .message-box-reply -->

		</form><!-- #send-reply -->

		<?php do_action( 'bp_template_after_message_thread_reply' ); ?>

	<?php endif; ?>

	<?php do_action( 'bp_template_after_message_thread_content' ); ?>

</div><!-- #message-thread -->