<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div id="bp-member-menu">
	<ul class="navigation">
		<li class="member-menu-avatar">
			<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
		</li>

		<?php bp_get_displayed_user_nav(); ?>
	</ul>
</div><!-- #bp-member-menu -->