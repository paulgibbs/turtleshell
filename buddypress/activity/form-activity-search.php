<?php
/**
 * Archive Activity search form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_activity_search_form' ); ?>

<form action="" id="bp_activity_search_form" method="get" enctype="multipart/form-data">

	<?php do_action( 'bp_template_activity_search_form_extras_top' ); ?>

	<label for="bp_activity_search_box"><?php _e( "Search and filter activity to keep up-to-date with what's happening", 'buddypress' ); ?></label>

	<div class="searchwrapper">
		<select id="bp_activity_filter" name="bp-activity-filter">
			<option value="-1"><?php esc_html_e( 'Everything', 'buddypress' ); ?></option>
			<?php bp_activity_types_list(); ?>
		</select>
		<label class="bp_filter_label" for="bp_activity_filter"><?php esc_html_e( 'Show:', 'buddypress' ); ?></label>

		<input class="submit" type="submit" value="<?php esc_attr_e( 'Search', 'buddypress' ) ?>" />
		<span><input class="search" id="bp_activity_search_box" type="search" name="s" placeholder="<?php echo esc_attr( bp_get_search_default_text( 'activity' ) ); ?>" value="<?php echo esc_attr( ! empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : '' ); ?>" /></span>
	</div>

	<?php do_action( 'bp_template_activity_search_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_activity_search_form' ); ?>
