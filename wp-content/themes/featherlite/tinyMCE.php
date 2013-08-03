<?php

add_action('admin_head', 'add_custom_buttons');
function add_custom_buttons() { 
wp_print_scripts( 'quicktags'); ?>
		
<script type='text/javascript'>
	
		
		edButtons[edButtons.length] = new edButton('tws_videocontainer',
		
			'Video Container',
			'[videocontainer] ',
			' [/videocontainer] ',
			''
		
		);
	</script>
<?php }	

?>