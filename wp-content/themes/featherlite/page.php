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

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- START OF BLOG WRAPPER -->
<div class="blog_wrapper">

<!-- START OF POST CLASS -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1><?php the_title (); ?></h1>

<?php 
if ( has_post_thumbnail() ) {  ?>

<?php the_post_thumbnail('slide'); ?>

<?php } ?>
 
<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'featherlite' ); ?></p> 

<?php endif; ?>



</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->

<!-- Clear Fix --><div class="clear"></div>

</section><!-- END OF SECTION -->

</div><!-- END OF CONTENT -->
           
<?php get_footer(); ?>