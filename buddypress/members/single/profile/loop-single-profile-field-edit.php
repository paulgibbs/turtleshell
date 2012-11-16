<?php
/**
 * Single profile field template. Used in the member profile group 'edit' loop.
 *
 * @package BuddyPress
 * @subpackage TurtleShell
 */
?>

<div<?php bp_field_css_class( 'editfield' ); ?>>

	<?php do_action( 'bp_template_in_member_profile_field_edit_loop_early' ); ?>


	<?php do_action( 'bp_template_before_member_profile_field_edit_control' ); ?>

	<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>
		<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
		<input type="text" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" value="<?php bp_the_profile_field_edit_value(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>/>

	<?php elseif ( 'textarea' == bp_get_the_profile_field_type() ) : ?>
		<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
		<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>><?php bp_the_profile_field_edit_value(); ?></textarea>

	<?php elseif ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>
		<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
		<select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>>
			<?php bp_the_profile_field_options(); ?>
		</select>

	<?php elseif ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>
		<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
		<select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" multiple="multiple" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>>
			<?php bp_the_profile_field_options(); ?>
		</select>

		<?php if ( ! bp_get_the_profile_field_is_required() ) : ?>
			<a class="button clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'buddypress' ); ?></a>
		<?php endif; ?>

	<?php elseif ( 'radio' == bp_get_the_profile_field_type() ) : ?>
		<div class="radio">
			<fieldset>
				<span class="label"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></span>
				<?php bp_the_profile_field_options(); ?>

				<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
					<a class="button clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'buddypress' ); ?></a>
				<?php endif; ?>
			</fieldset>
		</div>

	<?php elseif ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>
		<div class="checkbox">
			<fieldset>
				<span class="label"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></span>
				<?php bp_the_profile_field_options(); ?>
			</fieldset>
		</div>

	<?php elseif ( 'datebox' == bp_get_the_profile_field_type() ) : ?>
		<div class="datebox">
			<fieldset>
				<legend><?php _e( 'To pick a date, choose the day, month, and year.', 'buddypress' ); ?></legend>

				<label for="<?php bp_the_profile_field_input_name(); ?>_day"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'buddypress' ); ?><?php endif; ?></label>
				<select name="<?php bp_the_profile_field_input_name(); ?>_day" id="<?php bp_the_profile_field_input_name(); ?>_day" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>>
					<?php bp_the_profile_field_options( 'type=day' ); ?>
				</select>

				<select name="<?php bp_the_profile_field_input_name(); ?>_month" id="<?php bp_the_profile_field_input_name(); ?>_month" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>>
					<?php bp_the_profile_field_options( 'type=month' ); ?>
				</select>

				<select name="<?php bp_the_profile_field_input_name(); ?>_year" id="<?php bp_the_profile_field_input_name(); ?>_year" <?php if ( bp_get_the_profile_field_is_required() ) : ?>aria-required="true" required<?php endif; ?>>
					<?php bp_the_profile_field_options( 'type=year' ); ?>
				</select>
			</fieldset>
		</div>
	<?php endif; ?>

	<?php do_action( 'bp_template_after_member_profile_field_edit_control' ); ?>


	<?php do_action( 'bp_template_before_member_profile_field_edit_visibility' ); ?>

	<?php // @TODO: Ask Boone how this work. JS didn't work. ?>

	<?php do_action( 'bp_template_after_member_profile_field_edit_visibility' ); ?>


	<?php if ( bp_get_the_profile_field_description() ) : ?>

		<?php do_action( 'bp_template_before_member_profile_field_edit_description' ); ?>

		<div class="bp-template-notice info profile-field-description">
			<p><?php bp_the_profile_field_description(); ?></p>
		</div>

		<?php do_action( 'bp_template_after_member_profile_field_edit_description' ); ?>

	<?php endif; ?>


	<?php do_action( 'bp_template_in_member_profile_field_edit_loop_late' ); ?>

</div>