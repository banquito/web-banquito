<?php get_header(); ?>

<!-- START OF PAGE_WRAP --> 
<div id="page_wrap">
     
<!-- START OF CONTROL --> 
<div id="control">
<a id="controlbtn" class="open" href="#" alt="<?php _e( 'Show/View your stuffs', 'featherlite' ); ?>"></a>

</div><!-- END OF CONTROL --> 

<!-- START OF CONTENT --> 
<div class="content">

<!-- START OF SECTION -->
<section>
<p class="search_title"><?php _e( 'Results For: ', 'featherlite' ); ?> <?php echo($s); ?></p>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- START OF ARTICLE -->
<article>

<!-- START OF BLOG WRAPPER -->
<div class="blog_wrapper">

<!-- START OF POST CLASS -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- START OF CONTENT --> 
<div class="content">

<!-- START OF POST DETAILS -->
<div class="post_details">

<h1><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h1>

<!-- Start of searchpage -->
<div class="searchpage">

<!-- START OF AUTHOR -->
<div class="author">
<?php the_author(); ?>&nbsp; - &nbsp; 

</div><!-- END OF AUTHOR -->

</div><!-- End of searchpage -->

<?php if ('open' == $post->comment_status) { ?>

<!-- START OF COMMENT COUNT -->
<div class="comment_count">
<?php
if (get_comments_number()==1) { ?>

<?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>

<?php _e( 'Comment', 'featherlite' ); ?>&nbsp; - &nbsp; 

<?php } else { ?>

<?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>

<?php _e( 'Comments', 'featherlite' ); ?>&nbsp; - &nbsp; 

<?php } ?>

</div><!-- END OF COMMENT COUNT -->

<?php } ?>

<!-- START OF POST DATE -->
<div class="post_date">
<?php the_time('F j, Y') ?>

</div><!-- END OF POST DATE -->

</div><!-- END OF POST DETAILS -->

<?php the_excerpt (); ?>

<!-- START OF READ MORE -->
<div class="post_read_more">
<a href="<?php the_permalink (); ?>"><?php _e( 'Read More', 'featherlite' ); ?></a>

</div><!-- END OF READ MORE -->

<hr  />

</div><!-- END OF CONTENT -->

</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->

</article><!-- END OF ARTICLE -->

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'featherlite' ); ?></p> 

<?php endif; ?>

<!-- Start of pagination -->
<div class="pagination">
<?php if (function_exists("pagination")) {
    pagination($wp_query->max_num_pages);
} ?>

</div><!-- End of pagination -->

<!-- Clear Fix --><div class="clear"></div>

</section><!-- END OF SECTION -->
           
<?php get_footer(); ?>