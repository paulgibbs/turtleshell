<?php

/**
 * Member Settings template
 *
 * @package BuddyPress
 * @subpackage turtleshell
 */

?>

<?php do_action( 'bp_template_before_member_settings_content' ); ?>
	
	<?php
		if ( bp_is_current_action( 'notifications' ) ) :
			 bp_get_template_part( 'members/single/settings/notifications', 'settings' );
		
		elseif ( bp_is_current_action( 'delete-account' ) ) :
			 bp_get_template_part( 'members/single/settings/delete-account', 'settings' );
		
		elseif ( bp_is_current_action( 'general' ) ) :
			bp_get_template_part( 'members/single/settings/general', 'settings' );
		
		else :
			bp_get_template_part( 'members/single/plugins', 'plugins' );
		
		endif;
	?>
	
<?php do_action( 'bp_template_after_member_settings_content' ); ?>