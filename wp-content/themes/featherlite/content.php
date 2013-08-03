<?php
/*
 * The default template for displaying content
 */
?>

<!-- START OF BLOG WRAPPER -->
<div class="blog_wrapper">

<!-- START OF POST CLASS -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!-- START OF CONTENT --> 
<div class="content">

<!-- START OF POST DETAILS -->
<div class="post_details">

<h1><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h1>

<img src="<?php echo get_template_directory_uri(); ?>/img/std_icon.png" width="31" height="24" alt="<?php _e( 'standard post', 'featherlite' ); ?>" />

<!-- START OF AUTHOR -->
<div class="author">
<?php the_author(); ?>&nbsp; - &nbsp; 

</div><!-- END OF AUTHOR -->

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

<?php 
if ( has_post_thumbnail() ) {  ?>

<a class="featured_image" href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

<?php } ?>

<?php the_excerpt (); ?>

<!-- START OF READ MORE -->
<div class="post_read_more">
<a href="<?php the_permalink (); ?>"><?php _e( 'Read More', 'featherlite' ); ?></a>

</div><!-- END OF READ MORE -->

<hr  />

</div><!-- END OF CONTENT -->

</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->