<?php
/**
 * Single profile field template. Used in the member profile group 'view' loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<tr<?php bp_field_css_class(); ?>>
	<?php do_action( 'bp_template_in_member_profile_field_view_loop_early' ); ?>


	<?php do_action( 'bp_template_before_member_profile_field_view_name' ); ?>

	<td class="label"><?php bp_the_profile_field_name(); ?></td>

	<?php do_action( 'bp_template_after_member_profile_field_view_name' ); ?>


	<?php do_action( 'bp_template_before_member_profile_field_view_value' ); ?>

	<td class="data"><?php bp_the_profile_field_value(); ?></td>

	<?php do_action( 'bp_template_after_member_profile_field_view_value' ); ?>


	<?php do_action( 'bp_template_in_member_profile_field_view_loop_late' ); ?>
</tr>
