<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<ul id="bp-member-menu">
	<li class="member-menu-avatar">
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
	</li>

	<?php ts_bp_member_menu(); ?>


	<!-- placeholder only -->
	<li>
		<form method="post">
			<textarea style="box-sizing: border-box; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; width: 100%"></textarea>
			<input type="submit" nvalue="<?php _e( 'Post', 'buddypress' ); ?>" />
		</form>
	</li>
</ul>
