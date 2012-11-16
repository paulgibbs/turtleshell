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
		bp_get_template_part( 'members/single/messages/messages-compose' );

	elseif ( bp_is_current_action( 'view' ) ) :
		bp_get_template_part( 'members/single/messages/messages-single' );
		
	elseif ( bp_is_current_action( 'notices' ) ) :
		bp_get_template_part( 'members/single/messages/notices-loop' );
	
	else :
		bp_get_template_part( 'members/single/messages/messages-loop' );

	endif; 
	?>

<?php else: ?>

	<?php bp_get_template_part( 'members/single/messages/feedback-no-messages' ); ?>

<?php endif;?>

<?php do_action( 'bp_template_before_member_messages_content' ); ?>
