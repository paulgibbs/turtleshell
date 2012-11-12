<?php
/**
 * Single member settings/general template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_general_content' ); ?>

<div class="bp-member-settings-general">

	<?php bp_get_template_part( 'members/single/settings/form-settings-general' ); ?>

</div><!-- .bp-member-settings-general -->

<?php do_action( 'bp_template_after_member_settings_general_content' ); ?>
