<?php
/**
 * Single member messages template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messages_content' ); ?>

<?php
if ( bp_is_current_action( 'compose' ) ) :
	bp_get_template_part( 'members/single/messages/compose' );

elseif ( bp_is_current_action( 'view' ) ) :
	bp_get_template_part( 'members/single/messages/single' );
	
elseif ( bp_is_current_action( 'notices' ) ) :
	bp_get_template_part( 'members/single/messages/loop-notices' );

else :
	bp_get_template_part( 'members/single/messages/loop-messages' );

endif; 
?>

<?php do_action( 'bp_template_before_member_messages_content' ); ?>
