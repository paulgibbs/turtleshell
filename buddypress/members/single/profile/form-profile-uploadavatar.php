<form action="" method="post" enctype="multipart/form-data">

<?php wp_nonce_field( 'bp_avatar_upload' ); ?>
<p><?php _e( 'Choose a JPG, GIF, or PNG format photo from your computer, and then press the <em>Upload Image</em> button to proceed.', 'buddypress' ); ?></p>

<p id="avatar-upload">
	<input type="file" name="file" id="file" />
	<input type="submit" name="upload" id="upload" value="<?php _e( 'Upload Image', 'buddypress' ); ?>" />
	<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
</p>

<?php if ( bp_get_user_has_avatar() ) : ?>
	<p><?php _e( "If you'd like to delete your current avatar but not upload a new one, please use the delete avatar button.", 'buddypress' ); ?></p>
	<p><a class="button edit" href="<?php bp_avatar_delete_link(); ?>" title="<?php _e( 'Delete Avatar', 'buddypress' ); ?>"><?php _e( 'Delete My Avatar', 'buddypress' ); ?></a></p>
<?php endif; ?>

</form>
