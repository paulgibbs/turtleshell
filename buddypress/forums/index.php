<?php do_action( 'bp_before_directory_forums' ); ?>
zxcxz
<form action="" method="post" id="forums-search">
	<?php do_action( 'bp_before_directory_forums_content' ); ?>
	<div id="forums-search-form">
		<?php bp_directory_forums_search_form(); ?>
	</div>
</form>

<?php do_action( 'bp_before_topics' ); ?>

<form action="" method="post" id="bp-forums">
	<div class="forums-display">
		<ul>
			<li class="selected" id="forums-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_forums_root_slug() ); ?>"><?php printf( __( 'All Topics <span>%s</span>', 'buddypress' ), bp_get_forum_topic_count() ); ?></a></li>
			<?php if ( is_user_logged_in() && bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) ) : ?>
				<li id="forums-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_forums_slug() . '/topics' ); ?>"><?php printf( __( 'My Topics <span>%s</span>', 'buddypress' ), bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>
			<?php endif; ?>
			<?php do_action( 'bp_forums_directory_group_types' ); ?>
		</ul>
	</div>

	<div class="forums-filter">
		<ul>
			<?php do_action( 'bp_forums_directory_group_sub_types' ); ?>
			<li id="forums-order-select" class="last filter">
				<label for="forums-order-by"><?php _e( 'Order By:', 'buddypress' ); ?></label>
				<select id="forums-order-by">
					<option value="active"><?php _e( 'Last Active', 'buddypress' ); ?></option>
					<option value="popular"><?php _e( 'Most Posts', 'buddypress' ); ?></option>
					<option value="unreplied"><?php _e( 'Unreplied', 'buddypress' ); ?></option>
					<?php do_action( 'bp_forums_directory_order_options' ); ?>
				</select>
			</li>
		</ul>
	</div>

	<div id="forums-list">
		<?php bp_get_template_part( 'forums/loop', 'forums' ); ?>
	</div>

	<?php do_action( 'bp_directory_forums_content' ); ?>
	<?php wp_nonce_field( 'directory_forums', '_wpnonce-forums-filter' ); ?>

</form>

<?php do_action( 'bp_after_directory_forums' ); ?>
<?php do_action( 'bp_before_new_topic_form' ); ?>

<div id="forum-topic-post">
	<?php if ( is_user_logged_in() ) : ?>
		<?php if ( bp_is_active( 'groups' ) && bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100' ) ) : ?>
			<form action="" method="post" id="forum-topic-form" class="standard-form">
				<?php do_action( 'groups_forum_new_topic_before' ); ?>
				<a name="post-new"></a>
				<h5><?php _e( 'Create New Topic:', 'buddypress' ); ?></h5>
				<?php do_action( 'template_notices' ); ?>
				<label><?php _e( 'Title:', 'buddypress' ); ?></label>
				<input type="text" name="forum-topic-title" id="topic-title" value="" maxlength="100" />
				<label><?php _e( 'Content:', 'buddypress' ); ?></label>
				<textarea name="forum-topic-text" id="forum-topic-text"></textarea>
				<label><?php _e( 'Tags (comma separated):', 'buddypress' ); ?></label>
				<input type="text" name="forum-topic-tags" id="forum-topic-tags" value="" />
				<label><?php _e( 'Post In Group Forum:', 'buddypress' ); ?></label>
				<select id="forum-topic-group-id" name="forum-topic-group-id">
					<option value=""><?php /* translators: no option picked in select box */ _e( '----', 'buddypress' ); ?></option>
					<?php while ( bp_groups() ) : bp_the_group(); ?>
						<?php if ( bp_group_is_forum_enabled() && ( bp_current_user_can( 'bp_moderate' ) || 'public' == bp_get_group_status() || bp_group_is_member() ) ) : ?>
							<option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>
						<?php endif; ?>
					<?php endwhile; ?>
				</select><!-- #topic_group_id -->
				<?php do_action( 'groups_forum_new_topic_after' ); ?>
				<div class="forum-submit">
					<input type="submit" name="forum-submit-topic" id="forum-submit-topic" value="<?php _e( 'Post Topic', 'buddypress' ); ?>" />
					<input type="button" name="forum-submit-topic-cancel" id="forum-submit-topic-cancel" value="<?php _e( 'Cancel', 'buddypress' ); ?>" />
				</div>
				<?php wp_nonce_field( 'bp_forums_new_topic' ); ?>
			</form><!-- #forum-topic-form -->
		<?php elseif ( bp_is_active( 'groups' ) ) : ?>
			<?php bp_get_template_part( 'activity/feedback-no', 'forums' ); ?>
		<?php endif; ?>
	<?php endif; ?>
</div>

<?php do_action( 'bp_after_new_topic_form' ); ?>
<?php do_action( 'bp_after_directory_forums_content' ); ?>