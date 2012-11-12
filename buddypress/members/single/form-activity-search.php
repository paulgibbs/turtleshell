<?php
/**
 * Archive Activity search form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_activity_search_form' ); ?>

<form action="" id="bp_activity_search_form" method="get" enctype="multipart/form-data">

	<?php do_action( 'bp_template_member_activity_search_form_extras_top' ); ?>

	<div class="searchwrapper">
		<label class="bp_filter_label" for="bp_activity_filter"><?php esc_html_e( 'Show:', 'buddypress' ); ?></label>
		<select id="bp_activity_filter" name="bp-activity-filter">
			<option value="-1"><?php esc_html_e( 'Everything', 'buddypress' ); ?></option>
			<?php bp_activity_types_list(); ?>
		</select>

		<input class="submit" type="submit" value="<?php esc_attr_e( 'Filter activity', 'buddypress' ); ?> />
	</div>

	<?php do_action( 'bp_template_member_activity_search_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_activity_search_form' ); ?>
