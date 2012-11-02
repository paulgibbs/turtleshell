<?php
/**
 * Groups loop
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<?php do_action( 'bp_template_before_directory_groups_list' ); ?>

<ul class="bp-archive-groups">

	<?php do_action( 'bp_template_before_groups_loop' ); ?>

	<?php while ( bp_groups() ) : bp_the_group(); ?>

		<?php bp_get_template_part( 'groups/loop-single-group' ); ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_template_after_groups_loop' ); ?>

</ul><!-- .bp-archive-groups -->

<?php do_action( 'bp_template_after_directory_groups_list' ); ?>
