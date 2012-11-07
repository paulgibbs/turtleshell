<?php
/**
 * Single member messages template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

	<?php do_action( 'bp_template_before_member_messages_content' ); ?>

	<?php if ( bp_has_message_threads() ) : ?>

		<?php		
			if ( bp_is_current_action( 'compose' ) ) :
				bp_get_template_part( 'members/single/messages/messages-compose', 'messages' );
		
			elseif ( bp_is_current_action( 'view' ) ) :
				bp_get_template_part( 'members/single/messages/messages-single', 'messages' );
				
			elseif ( bp_is_current_action( 'notices' ) ) :
				bp_get_template_part( 'members/single/messages/notices-loop', 'messages' );			
			
			else :
				bp_get_template_part( 'members/single/messages/messages-loop', 'messages' );
	
			endif; 
		?>
	
	<?php else: ?>
	
		<?php bp_get_template_part( 'members/single/messages/no-messages', 'no-messages' ); ?>

	<?php endif;?>
	
	<?php do_action( 'bp_template_before_member_messages_content' ); ?>
