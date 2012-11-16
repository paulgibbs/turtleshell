<?php
/**
 * Messages notices loop content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="message-search"><?php bp_message_search_form(); ?></div>
	
<?php do_action( 'bp_template_before_notices_loop' ); ?>

<ul id="message-threads" class="messages-list">
		<?php while ( bp_message_threads() ) : bp_message_thread(); ?>
			<li id="notice-<?php bp_message_notice_id(); ?>" class="<?php bp_message_css_class(); ?>">
			
				<?php do_action( 'bp_template_notices_before_list_item' ); ?>			
				<div class="notice-buttons">
					<a class="button confirm" href="<?php bp_message_activate_deactivate_link(); ?>"><?php bp_message_activate_deactivate_text(); ?></a>
					<a class="button confirm" href="<?php bp_message_notice_delete_link(); ?>">Delete</a>
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