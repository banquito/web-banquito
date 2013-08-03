<div class="clear"></div>

</div><!-- END OF PAGE_WRAP -->
  
</div><!-- END OF CONTENT -->
  
</div><!-- END OF MAINCONTENT -->

</div><!-- END OF WRAP --> 

<!-- START OF FOOTER -->
<footer>

<!-- START OF TOTOP -->
<div id="toTop"><?php _e( 'Back to Top', 'featherlite' ); ?>

</div><!-- END OF TOTOP -->

</footer>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$analytics = get_option_tree( 'vn_tracking' );
} ?>     

<?php echo stripslashes($analytics); ?>

<script type="text/javascript">
// DOM ready
jQuery(document).ready(function(){
	 
jQuery("a#controlbtn").click(function(e) {
        e.preventDefault();
        var slidepx=jQuery("div#linkblock").width() + 10;
    	if ( !jQuery("div#maincontent").is(':animated') ) { 
			if (parseInt(jQuery("div#maincontent").css('marginLeft'), 10) < slidepx) {
     			jQuery(this).removeClass('close').html('');
      			margin = "+=" + slidepx;
    		} else {
     			jQuery(this).addClass('close').html('');
      			margin = "-=" + slidepx;
    		}
        	jQuery("div#maincontent").animate({ 
        		marginLeft: margin
      		}, {
                    duration: 'slow',
                    easing: 'easeOutQuint'
                });
    	} 
      }); 
	  
jQuery('#respnav').click(function() {
          jQuery('#linkblock2').animate({
               height: 'toggle'
               }, 500
          );
     });
	  
jQuery('.nav > li > a').click(function(){
    if (jQuery(this).attr('class') != 'active'){
      jQuery('.nav li ul.sub-menu').slideUp();
      jQuery(this).next().slideToggle();
      jQuery('.nav li a').removeClass('active');
      jQuery(this).addClass('active');
    }
  });
  
  
jQuery('#post').click(function() {
          jQuery('#post_details').animate({
               height: 'toggle'
               }, 500
          );
     });
	 
selectnav('menu-primary', {
				label: 'Menu',
				nested: true,
				indent: '-'
			});
	 
jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() != 0) {
			jQuery('#toTop').fadeIn();	
		} else {
			jQuery('#toTop').fadeOut();
		}
	});
 
jQuery('#toTop').click(function() {
		jQuery('body,html').animate({scrollTop:0},800);
	});	
	
jQuery('.videocontainer').fitVids({ customSelector: ""});
	
});

</script> 

<?php wp_footer(); ?>

</body>
</html>