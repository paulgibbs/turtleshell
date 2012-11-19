<?php
/**
 * Messages single message content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messages_single_content' ); ?>

<div class="bp-member-messages-single">

	<?php if ( bp_thread_has_messages() ) : ?>

		<?php do_action( 'bp_template_before_member_messages_single_subject' ); ?>

		<p class="message-subject"><?php bp_the_thread_subject(); ?></p>
		<div class="message-meta">
			<p><?php printf( __( 'Conversation between %s and you.', 'buddypress' ), bp_get_the_thread_recipients() ); ?></p>
		</div>

		<?php do_action( 'bp_template_after_member_messages_single_subject' ); ?>


		<ol>
			<?php while ( bp_thread_messages() ) : bp_thread_the_message(); ?>

				<li class="message-body <?php bp_the_thread_message_alt_class(); ?>">
					<p>
						<a href="<?php bp_the_thread_message_sender_link(); ?>"><?php bp_the_thread_message_sender_name(); ?></a>
						<span class="message-timestamp"><?php bp_the_thread_message_time_since(); ?></span>
					</p>

					<div class="message-content"><?php bp_the_thread_message_content(); ?></div>
				</li><!-- .message-body -->

			<?php endwhile; ?>
		</ol>


		<?php bp_get_template_part( 'members/single/messages/form-messages-reply' ); ?>

	<?php endif; ?>

</div><!-- .bp-member-messages-single -->

<?php do_action( 'bp_template_after_member_messages_single_content' ); ?>
