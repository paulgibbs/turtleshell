<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<ul id="bp-member-menu">
	<li class="member-menu-user">
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
	</li>

	<?php ts_bp_member_menu(); ?>
</ul>
