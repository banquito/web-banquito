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

<?php while(have_posts()) : the_post(); ?>

<!-- START OF ARTICLE -->
<article>

<?php get_template_part( 'content', get_post_format() ); ?>

<?php endwhile; ?> 

</article><!-- END OF ARTICLE -->

<!-- Start of pagination -->
<div class="pagination">
<?php if (function_exists("pagination")) {
    pagination($wp_query->max_num_pages);
} ?>

</div><!-- End of pagination -->

<!-- Clear Fix --><div class="clear"></div>

</section><!-- END OF SECTION -->
           
<?php get_footer(); ?>