<?php
/**
 * Archive Member search form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_search_form' ); ?>

<form action="" id="bp_member_search_form" method="get">

	<?php do_action( 'bp_template_member_search_form_extras_top' ); ?>

	<div class="searchwrapper">
		<label for="bp_member_search_form_box"><?php _e( 'Discover people in the community and make connections with new friends', 'buddypress' ); ?></label>
		<input class="submit" type="submit" value="<?php esc_attr_e( 'Search', 'buddypress' ) ?>" />
		<span><input class="search" id="bp_member_search_form_box" type="search" name="s" placeholder="<?php echo esc_attr( bp_get_search_default_text( 'members' ) ); ?>" value="<?php echo esc_attr( ! empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : '' ); ?>" required autofocus /></span>
	</div>

	<?php do_action( 'bp_template_member_search_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_member_search_form' ); ?>
