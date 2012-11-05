<?php
/**
 * Messages search content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div id="message-search">

	<?php if ( bp_is_messages_inbox() || bp_is_messages_sentbox() ) : ?>

		<span class="message-search"><?php bp_message_search_form(); ?></span>

	<?php endif; ?>
	
	<?php if ( bp_is_current_action( 'sentbox' ) ) : ?>
		<h4 class="message-title"><?php _e( 'Sent', 'buddypress' ); ?></h4>
		
	<?php elseif ( bp_is_current_action( 'notices' ) ) : ?>
		<h4 class="message-title"><?php _e( 'Notices', 'buddypress' ); ?></h4>
		
	<?php elseif ( bp_is_current_action( 'compose' ) ) : ?>
		<h4 class="message-title"><?php _e( 'Compose', 'buddypress' ); ?></h4>
		
	<?php else: ?>
		<h4 class="message-title"><?php _e( 'Inbox', 'buddypress' ); ?></h4>
		
	<?php endif; ?>

</div><!-- #message-search -->