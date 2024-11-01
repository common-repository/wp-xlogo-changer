<?php 
if (!defined('ABSPATH'))
    exit;

function wp_xlogo_page(){

	if (isset($_POST['save_logo']) && isset($_POST['image_url']) && !empty($_POST['image_url'])) {
		
		if (filter_var($_POST['image_url'], FILTER_VALIDATE_URL) !== FALSE) {
		  update_option( 'wp_xlogo_image', sanitize_text_field($_POST['image_url']));
		}

		if (isset($_POST['width']) && isset($_POST['height']) && isset($_POST['bsize']) ) {
			if (is_numeric($_POST['width']) && is_numeric($_POST['height']) && is_numeric($_POST['bsize'])){
				update_option( 'wp_xlogo_width', sanitize_text_field($_POST['width']));
				update_option( 'wp_xlogo_height', sanitize_text_field($_POST['height']));
				update_option( 'wp_xlogo_bsize', sanitize_text_field($_POST['bsize']));
			}
		}
	}
?>
<div class="wrap">
	<h1>WP xLogo Changer <a href="https://nexxoz.com/" target="_new" class="page-title-action sad"><?php _e('Visit Author', 'wp-xlogo-login-logo'); ?></a></h1>


	<form method="post">

		<p>
			<label><?php _e('Width & Height', 'wp-xlogo-login-logo'); ?></label><br/>
			<input type="text" size="36" name="width" class="form-input" value="<?php echo esc_html(get_option( 'wp_xlogo_width' )); ?>">px <br/>
			<input type="text" size="36" name="height" class="form-input" value="<?php echo esc_html(get_option( 'wp_xlogo_height' )); ?>">px
		</p>

		<p>
			<label><?php _e('Logo size', 'wp-xlogo-login-logo'); ?></label><br/>
			<input type="text" size="36" name="bsize" class="form-input" value="<?php echo esc_html(get_option( 'wp_xlogo_bsize' )); ?>">px
		</p>


		<p>
			<label><?php _e('Choose logo', 'wp-xlogo-login-logo'); ?></label><br/>
			<input type="text" id="image_url" size="30" name="image_url" class="form-input" value="<?php echo esc_html(get_option( 'wp_xlogo_image' )); ?>">
			<input id="_btn" class="button button-large upload_image_button button-primary" type="button" value="..."/>
		</p>

		<p>
			<input class="button button-large button-primary btn-save" type="submit" name="save_logo" value="Save" />
		</p>

		<p>	
			<img src="" style="display:none;"  class="attachment-post-thumbnail" id="image_display">
		</p>

	</form>

</div>
<?php
}
?>