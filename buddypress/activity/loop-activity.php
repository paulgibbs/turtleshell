<?php do_action( 'bp_before_activity_loop' ); ?>

<?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ) ) ) : ?>

	<?php bp_get_template_part( 'activity/pagination', 'activity'); ?>

	<?php if ( empty( $_POST['page'] ) ) : ?>

	<ul id="activity-view">

	<?php endif; ?>

	<?php while ( bp_activities() ) : bp_the_activity(); ?>

		<?php bp_get_template_part( 'activity/activity', 'entry' ); ?>

	<?php endwhile; ?>

	<?php if ( bp_activity_has_more_items() ) : ?>

		<li class="load-more">
			<a href="#more"><?php _e( 'Load More', 'buddypress' ); ?></a>
		</li>

	<?php endif; ?>

	<?php if ( empty( $_POST['page'] ) ) : ?>

		</ul>

	<?php endif; ?>

<?php else : ?>

	<?php bp_get_template_part( 'activity/feedback-no', 'activity'); ?>

<?php endif; ?>

<?php do_action( 'bp_after_activity_loop' ); ?>

<form action="" name="activity-loop-form" id="activity-loop-form" method="post">

	<?php wp_nonce_field( 'activity_filter', '_wpnonce_activity_filter' ); ?>

</form>