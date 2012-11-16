<?php
/**
 * Single profile group loop. Used in the member profile view loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div class="<?php echo esc_attr( sanitize_html_class( bp_get_the_profile_group_slug() ) ); ?>">
	<?php do_action( 'bp_template_in_member_profile_group_view_loop_early' ); ?>

	<table summary="<?php echo esc_attr( sprintf( __( 'Profile data for %s. The first column of each row is a description of the type of data that is recorded (e.g. "gender"), and the second column is the data value (e.g. "female").', 'buddypress' ), bp_get_displayed_user_fullname() ) ); ?>">
		<caption><?php bp_the_profile_group_name(); ?></caption>

		<thead>
			<tr>
				<th><?php _e( 'Profile data name', 'buddypress' ); ?></th>
				<th><?php _e( 'Profile data value', 'buddypress' ); ?></th>
			</tr>
		</thead>

		<tfoot>
			<tr>
				<th><?php _e( 'Profile data name', 'buddypress' ); ?></th>
				<th><?php _e( 'Profile data value', 'buddypress' ); ?></th>
			</tr>
		</tfoot>

		<?php do_action( 'bp_template_before_member_profile_field_loop' ); ?>

		<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

			<tbody>

				<?php if ( bp_field_has_data() ) : ?>

					<?php bp_get_template_part( 'members/single/profile/loop-single-profile-field-view', sanitize_file_name( bp_get_the_profile_group_slug() ) ); ?>

				<?php endif; ?>

			</tbody>

		<?php endwhile; ?>

		<?php do_action( 'bp_template_after_member_profile_field_loop' ); ?>

	</table>

	<?php do_action( 'bp_template_in_member_profile_group_view_loop_late' ); ?>
</div>
