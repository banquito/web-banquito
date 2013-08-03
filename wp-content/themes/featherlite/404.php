<?php $path = get_template_directory_uri();
if(!isset($_REQUEST['error']))  $error_code = '404';
else  $error_code = $_REQUEST['error'];
?>
<?php ob_start(); ?>

<?php get_header(); ?>

<!-- START OF PAGE_WRAP --> 
<div id="page_wrap">
     
<!-- START OF CONTROL --> 
<div id="control">
<a id="controlbtn" class="open" href="#" alt="Show/View your stuffs"></a>

</div><!-- END OF CONTROL --> 

<!-- START OF CONTENT --> 
<div class="content">

<!-- START OF SECTION -->
<section>

<!-- START OF BLOG WRAPPER -->
<div class="blog_wrapper">

<!-- START OF POST CLASS -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- START OF CONTENT --> 
<div class="content">
<?php _e( '<p class="page_error">Page not found.</p>
<p class="small">No need to panic!</p><hr />
<p class="page_error_text">Sorry, but the page you are looking for has moved or no longer exists.</p><p>Please use the search below, or the menu to locate the missing page.', 'featherlite' ); ?></p>

<br />

<div class="page_search"><?php get_search_form(); ?></div>

<hr  />

</div><!-- END OF CONTENT -->

</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->

<!-- Clear Fix --><div class="clear"></div>

</section><!-- END OF SECTION -->

</div><!-- END OF CONTENT -->
           
<?php get_footer(); ?>