<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div id="bp-member-menu">
	<ul class="navigation">
		<li class="member-menu-avatar">
			<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
		</li>

		<?php bp_get_displayed_user_nav(); ?>
	</ul>


	<?php if ( bp_is_active( 'activity' ) ) : ?>
		<div class="activity">

			<form action="<?php bp_activity_post_form_action(); ?>" method="post" name="whats-new-form" id="bp-member-activity-form">
				<?php do_action( 'bp_before_activity_post_form' ); ?>

				<textarea name="whats-new" placeholder="Placeholder text goes here. If on another user's page, this sends them a @message."></textarea>
				<input type="submit" name="aw-whats-new-submit" value="<?php esc_attr_e( 'Send Update', 'buddypress' ); ?>" />

				<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
				<?php do_action( 'bp_activity_post_form_options' ); ?>

				<?php do_action( 'bp_after_activity_post_form' ); ?>
			</form><!-- #bp-member-activity-form -->

		</div>
	<?php endif; ?>

</div><!-- #bp-member-menu -->