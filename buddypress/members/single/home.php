<?php
/**
 * Single member content part
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_before_member_page' ); ?>

<div id="buddypress">

	<?php do_action( 'bp_before_member_content' ); ?>

	<?php bp_get_template_part( 'members/single/menu', 'members' ); ?>

	<div id="bp-member-content">

		<?php do_action( 'bp_before_member_body' );

		if ( bp_is_user_activity() ) :
			bp_get_template_part( 'members/single/activity' );

		elseif ( bp_is_user_blogs() ) :
			bp_get_template_part( 'members/single/blogs'    );

		elseif ( bp_is_user_friends() ) :
			bp_get_template_part( 'members/single/friends'  );

		elseif ( bp_is_user_groups() ) :
			bp_get_template_part( 'members/single/groups'   );

		elseif ( bp_is_user_messages() ) :
			bp_get_template_part( 'members/single/messages' );

		elseif ( bp_is_user_profile() || ! bp_current_component() ) :
			bp_get_template_part( 'members/single/profile'  );

		elseif ( bp_is_user_settings() ) :
			bp_get_template_part( 'members/single/settings' );

		else :
			bp_get_template_part( 'members/single/plugins'  );
		endif;

		do_action( 'bp_after_member_body' ); ?>

	</div><!-- .bp-member-content -->

	<?php do_action( 'bp_after_member_content' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_member_page' ); ?>
