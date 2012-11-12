<?php
/**
 * Single member profile/change avatar template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="bp-member-profile-changeavatar">

	<p><?php printf( __( 'Your avatar will be used on your profile and throughout the site. If there is a <a href="%s">Gravatar</a> associated with your account email, we will use that, or you can upload an image from your computer.', 'buddypress' ), 'http://gravatar.com' ); ?></p>

	<?php
	if ( 'upload-image' == bp_get_avatar_admin_step() ) :
		bp_get_template_part( 'members/single/profile/form-profile-uploadavatar' );

	elseif ( 'crop-image' == bp_get_avatar_admin_step() ) :
		bp_get_template_part( 'members/single/profile/form-profile-cropavatar' );

	endif;
	?>

</div><!-- .bp-member-profile-changeavatar -->
