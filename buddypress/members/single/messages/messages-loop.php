<?php
/**
 * Messages message loop content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php bp_get_template_part( 'members/single/messages/messages-search', 'messages' ); ?>
<?php bp_get_template_part( 'members/single/messages/messages-options', 'messages' ); ?>
<?php bp_get_template_part( 'members/single/messages/messages-pagination', 'messages' ); ?>

<?php do_action( 'bp_template_before_member_messages_loop' ); ?>

<ul id="message-threads" class="messages-list">
	<?php while ( bp_message_threads() ) : bp_message_thread(); ?>

		<li id="m-<?php bp_message_thread_id(); ?>" class="<?php bp_message_css_class(); ?><?php if ( bp_message_thread_has_unread() ) : ?> unread"<?php else: ?> read"<?php endif; ?>>
		
		<?php do_action( 'bp_template_messages_inbox_before_list_item' ); ?>

			<span class="thread-content">
				<span class="thread-avatar"><?php bp_message_thread_avatar(); ?></span>
							
				<span class="thread-link"><a href="<?php bp_message_thread_view_link(); ?>" title="<?php _e( "View Message", "buddypress" ); ?>"><?php bp_message_thread_subject(); ?></a></span>
												
				<span class="thread-date"><?php bp_message_thread_last_post_date(); ?></span>
			</span><!-- .thread-content -->
			
			<span class="thread-options">
					<input type="checkbox" name="message_ids[]" value="<?php bp_message_thread_id(); ?>" />						
					<a class="button confirm" href="<?php bp_the_thread_delete_link(); ?>" title="<?php _e( "Delete Message", "buddypress" ); ?>"><?php _e( 'Delete', 'buddypress' ); ?></a>
			</span><!-- .thread-options -->
			
			<?php do_action( 'bp_template_messages_inbox_after_list_item' ); ?>

		</li><!-- #m-{id} -->

	<?php endwhile; ?>
</ul><!-- #message-threads -->

<?php bp_get_template_part( 'members/single/messages/messages-pagination', 'messages' ); ?>
<?php bp_get_template_part( 'members/single/messages/messages-options', 'messages' ); ?>


<?php do_action( 'bp_template_after_member_messages_options' ); ?>		
<?php do_action( 'bp_template_after_member_messages_loop' ); ?>