<?php
/**
 * Archive Group search form
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_group_search_form' ); ?>

<form action="" id="bp_group_search" method="get">

	<?php do_action( 'bp_template_group_search_form_extras_top' ); ?>

	<div>
		<label for="bp_group_search_box"><?php _e( 'Find groups and interact with like-minded people over a common topic', 'buddypress' ); ?></label>
		<input class="submit" type="submit" value="<?php esc_attr_e( 'Search', 'buddypress' ) ?>" />
		<span><input class="search" id="bp_group_search_box" type="search" name="s" placeholder="<?php echo esc_attr( bp_get_search_default_text( 'groups' ) ); ?>" value="<?php echo esc_attr( ! empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : '' ); ?>" required autofocus /></span>
	</div>

	<?php do_action( 'bp_template_group_search_form_extras_bottom' ); ?>

</form>

<?php do_action( 'bp_template_after_group_search_form' ); ?>
