<?php
/**
 * Single member menu template
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_member_menu_content' ); ?>

<div id="bp-menu">
	<ul class="bp-navigation no-menu-js">

		<?php do_action( 'bp_template_before_member_menu_avatar' ); ?>

		<li class="member-menu-avatar" style="height: <?php echo bp_core_avatar_full_height(); ?>px">
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


		<?php do_action( 'bp_template_before_member_menu_user_nav' ); ?>

		<?php bp_nav_menu( 'container=false' ); ?>

		<?php do_action( 'bp_template_after_member_menu_user_nav' ); ?>

	</ul>
</div><!-- #bp-menu -->

<?php do_action( 'bp_template_after_member_menu_content' ); ?>
