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

	<div class="bp-member-content">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non elit mauris. Duis in gravida mi. Pellentesque ultricies dictum orci, id sagittis leo lobortis et. Fusce egestas, nisi nec posuere feugiat, erat mi ultricies sapien, at convallis mi dolor eu ipsum. Curabitur viverra placerat urna, sit amet ullamcorper lorem consectetur ac. Cras placerat tincidunt venenatis. Ut sodales neque quis odio volutpat in facilisis erat tristique. Quisque tempus, nibh sed sodales varius, orci nisi pharetra risus, id aliquam sapien metus vitae tortor. Fusce ac vestibulum justo. Aenean tempus, nisl nec mattis ullamcorper, augue metus mollis libero, sed mattis nulla augue ut velit. Duis sit amet sem nec justo malesuada mollis sed nec leo. Nam eleifend tempus arcu, quis convallis tellus semper vulputate.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non elit mauris. Duis in gravida mi. Pellentesque ultricies dictum orci, id sagittis leo lobortis et. Fusce egestas, nisi nec posuere feugiat, erat mi ultricies sapien, at convallis mi dolor eu ipsum. Curabitur viverra placerat urna, sit amet ullamcorper lorem consectetur ac. Cras placerat tincidunt venenatis. Ut sodales neque quis odio volutpat in facilisis erat tristique. Quisque tempus, nibh sed sodales varius, orci nisi pharetra risus, id aliquam sapien metus vitae tortor. Fusce ac vestibulum justo. Aenean tempus, nisl nec mattis ullamcorper, augue metus mollis libero, sed mattis nulla augue ut velit. Duis sit amet sem nec justo malesuada mollis sed nec leo. Nam eleifend tempus arcu, quis convallis tellus semper vulputate.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non elit mauris. Duis in gravida mi. Pellentesque ultricies dictum orci, id sagittis leo lobortis et. Fusce egestas, nisi nec posuere feugiat, erat mi ultricies sapien, at convallis mi dolor eu ipsum. Curabitur viverra placerat urna, sit amet ullamcorper lorem consectetur ac. Cras placerat tincidunt venenatis. Ut sodales neque quis odio volutpat in facilisis erat tristique. Quisque tempus, nibh sed sodales varius, orci nisi pharetra risus, id aliquam sapien metus vitae tortor. Fusce ac vestibulum justo. Aenean tempus, nisl nec mattis ullamcorper, augue metus mollis libero, sed mattis nulla augue ut velit. Duis sit amet sem nec justo malesuada mollis sed nec leo. Nam eleifend tempus arcu, quis convallis tellus semper vulputate.</p>
	</div>

	<?php do_action( 'bp_after_member_content' ); ?>

</div><!-- #buddypress -->

<?php do_action( 'bp_after_member_page' ); ?>
