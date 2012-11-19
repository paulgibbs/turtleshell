<?php
/**
 * Single member settings/capabilities template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_settings_capabilities_content' ); ?>

<div class="bp-member-settings-capabilities">

	<?php bp_get_template_part( 'members/single/settings/form-settings-capabilities' ); ?>

</div><!-- .bp-member-settings-capabilities -->

<?php do_action( 'bp_template_after_member_settings_capabilities_content' ); ?>
