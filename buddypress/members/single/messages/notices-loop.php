<?php
/**
 * Messages notices loop content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php bp_get_template_part( 'members/single/messages/messages-search', 'messages' ); ?>
	
<?php do_action( 'bp_template_before_notices_loop' ); ?>

<ul id="message-threads" class="messages-list">
		<?php while ( bp_message_threads() ) : bp_message_thread(); ?>
			<li id="notice-<?php bp_message_notice_id(); ?>" class="<?php bp_message_css_class(); ?>">
			
				<?php do_action( 'bp_template_notices_before_list_item' ); ?>			
				<div class="notice-buttons">
					<a class="button" href="<?php bp_message_activate_deactivate_link(); ?>" class="confirm"><?php bp_message_activate_deactivate_text(); ?></a>
					<a class="button" href="<?php bp_message_notice_delete_link(); ?>" class="confirm">Delete</a>
				</div>
				<div class="notice-content">
					<span class="notice-subject"><?php bp_message_notice_subject(); ?></span>
					<?php bp_message_notice_text(); ?>
				</div>
				
				<div class="notice-action">
					<?php if ( bp_messages_is_active_notice() ) : ?>

						<?php bp_messages_is_active_notice(); ?>

					<?php endif; ?>

					<div class="notice-date"><?php _e( 'Sent:', 'buddypress' ); ?> <?php bp_message_notice_post_date(); ?></div>
				

				<?php do_action( 'bp_template_notices_list_item' ); ?>
				</div>
				
				
				<?php do_action( 'bp_template_notices_after_list_item' ); ?>
				
			</li>
		<?php endwhile; ?>
</ul><!-- #message-threads -->

<?php do_action( 'bp_template_after_notices' ); ?>
<?php do_action( 'bp_template_after_notices_loop' ); ?>