jQuery(document).ready(function(){



	var formfield;
	jQuery('.upload_image_button').click(function() {
		jQuery('html').addClass('Image');
		formfield = jQuery(this).prev().attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});

	window.original_send_to_editor = window.send_to_editor;

	window.send_to_editor = function(html){
		if (formfield) {
			fileurl = jQuery(html).attr('src');


			jQuery('#image_display').attr("src", fileurl); // <---- THE IMAGE SRC
			jQuery('#image_display').show();

			jQuery('#image_url').val(fileurl); // <---- THE IMAGE SRC

			tb_remove();
			jQuery('html').removeClass('Image');
		} else {
			window.original_send_to_editor(html);
		}
	};



});
