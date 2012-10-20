<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_menu_content' ); ?>

<div id="bp-member-menu">
	<ul class="navigation">

		<?php do_action( 'bp_template_before_member_menu_avatar' ); ?>

		<li class="member-menu-avatar">
			<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
		</li>

		<?php do_action( 'bp_template_after_member_menu_avatar' ); ?>


		<?php if ( ! bp_is_my_profile() ) : ?>
			<?php do_action( 'bp_template_before_member_menu_friend' ); ?>

			<li class="member-menu-friend">
				<?php bp_add_friend_button(); ?>
			</li>

			<?php do_action( 'bp_template_after_member_menu_friend' ); ?>
		<?php endif; ?>

		<?php do_action( 'bp_template_member_menu_buttons' ); ?>


		<?php do_action( 'bp_template_before_member_menu_user_nav' ); ?>

		<?php bp_get_displayed_user_nav(); ?>

		<?php do_action( 'bp_template_after_member_menu_user_nav' ); ?>

	</ul>
</div><!-- #bp-member-menu -->

<?php do_action( 'bp_template_after_member_menu_content' ); ?>
