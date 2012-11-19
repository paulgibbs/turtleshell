<?php
/**
 * Single member settings/compose template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_messages_compose_content' ); ?>

<div class="bp-member-messages-compose">

	<?php bp_get_template_part( 'members/single/messages/form-messages-compose' ); ?>

</div><!-- .bp-member-messages-compose -->

<?php do_action( 'bp_template_after_member_messages_compose_content' ); ?>
