<?php get_header(); ?>

<!-- START OF PAGE_WRAP --> 
<div id="page_wrap">
     
<!-- START OF CONTROL --> 
<div id="control">
<a id="controlbtn" class="open" href="#" alt="Show/View your stuffs"></a>

</div><!-- END OF CONTROL --> 

<!-- START OF CONTENT --> 
<div class="content">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- START OF BLOG WRAPPER -->
<div class="blog_wrapper">

<!-- START OF POST CLASS -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1><?php the_title (); ?></h1>

<?php 
    if (has_post_format('gallery')) { ?>
    
<?php
$attachments = get_children(
array(
'post_type' => 'attachment',
'post_mime_type' => 'image',
'post_parent' => $post->ID
));
if(count($attachments) > 1) { ?>

<!-- Start of slider -->
<section class="slider">

<ul class="slides">
<?php 

$args = array(
'post_type' => 'attachment',
'numberposts' => -1,
'post_status' => null,
'post_parent' => $post->ID
);

$attachments = get_posts( $args );
if ( $attachments ) {
foreach ( $attachments as $attachment ) {
echo '<li>';
echo wp_get_attachment_image( $attachment->ID, 'slide' );
echo '</li>';
}
}

?>

</ul><!-- End of slides -->	

<div class="clear"></div>

</section><!-- End of slider -->

<?php the_content('        '); ?>

<?php } else { ?>

<?php the_post_thumbnail('slide'); ?>

<?php the_content('        '); ?>

<?php }?>

<?php ; } elseif (has_post_format('quote')) { ?>

<blockquote><?php the_content('        '); ?></blockquote>

<?php ; } elseif (has_post_format('audio')) { ?>

<?php the_post_thumbnail('slide'); ?>

<?php the_content('        '); ?> 

	<?php 
	
	$args = array(
	'order'          => 'ASC',
	'orderby' => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'audio',
	'post_status'    => null,
	'numberposts'    => 999,
	);
	
$attachments = get_children($args); 
	
	if(count( $attachments ) > 0) { ?>
		 
		<audio class="cw-audio" preload> </audio>
		
		<ol class="audio-list">

			<?php foreach ($attachments as $attachment) {	
		     	
		     	$track_title = $attachment->post_title;
		     	
		     	$track_author = $attachment->post_excerpt; ?>
			 		
		     		<li><a href="#" data-src="<?php echo wp_get_attachment_url($attachment->ID); ?>"><?php echo $track_title; ?>&nbsp;</a><?php if($track_author != '' ){ echo '-&nbsp;' . '<span>' . $track_author . '</span>'; }?></li>

		     <?php } ?>
			 	
		</ol>	 			 

	<?php } ?>

<?php ; } else { ?>

<?php the_post_thumbnail('slide'); ?>

<?php the_content('        '); ?>

<?php } ?>


<!-- START OF SOCIAL --> 
<div class="social">
    <a href="http://www.facebook.com/share.php?u=<?php the_permalink (); ?>" class="social_button"><?php _e( 'Facebook', 'featherlite' ); ?></a>
    <a href="http://twitter.com/home?status=<?php the_permalink (); ?>" class="social_button"><?php _e( 'Twitter', 'featherlite' ); ?></a>
    <a href="https://plus.google.com/share?url=<?php the_permalink (); ?>" class="social_button"><?php _e( 'Google +', 'featherlite' ); ?></a>
    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink (); ?>" class="social_button"><?php _e( 'Pinterest', 'featherlite' ); ?></a>
</div><!-- END OF SOCIAL --> 
    
<hr  />

<!-- START OF POST_DETAILS --> 
<div id="post_details">

    <div class="post_date"><span class="strong"><?php _e( 'Posted On:', 'featherlite' ); ?></span> <?php the_time('F j, Y') ?></div>
    <div class="category"><span class="strong"><?php _e( 'Posted In:', 'featherlite' ); ?></span> <?php
$taxonomy = 'types';
  $terms = get_terms( $taxonomy, '' );
  if ($terms) {
    foreach($terms as $term) {
        echo '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( 'View all posts in %s', 'featherlite' ), $term->name ) . '" ' . '>' . $term->name.'</a> ';
    }
  } ?></div>
    
    <?php if ('open' == $post->comment_status) { ?>
    <div class="comment_count"><?php
	if (get_comments_number()==1) { ?>
	
	<?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>
	
	<?php _e( 'COMMENT', 'featherlite' ); ?> 
	
	<?php } else { ?>
	
	<?php comments_popup_link( '0', '1', '%', 'comments-link', ''); ?>
	
	<?php _e( 'COMMENTS', 'featherlite' ); ?> 
	
	<?php } ?></div>
    
    <?php } ?>
    
    <br />
    
    <!-- START OF AUTHOR BIO -->     
    <section class="post-author">
	
		<div class="left_author">
        <div class="author-img-wrap alignleft">
		<?php echo get_avatar( get_the_author_meta('ID'), 75 ); ?>
		</div>
        </div>

		<div class="author-content">
        
		<header class="author-meta-header">
		<h5 class="author-title">Escrito Por: <?php the_author_link(); ?></h5>
		</header>

		<p class="author-desc"><?php the_author_meta('user_description'); ?></p>
	
		</div>

	</section> <!-- END OF AUTHOR BIO -->

</div><!-- END OF POST_DETAILS -->

<!-- START OF POST -->
<div id="post"><?php _e( 'Post Details', 'featherlite' ); ?></div><!-- END OF POST -->
    
</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'featherlite' ); ?></p> 

<?php endif; ?>

</div><!-- END OF CONTENT -->

<!-- START OF NAVIGATION WRAPPER -->
<div class="navigation_wrapper">

<!-- START OF NAVIGATION -->
<div class="navigation">

<!-- START OF ALIGNLEFT -->
<div class="alignleft">
<div class="postpagination"><?php _e( 'Previous Post:', 'featherlite' ); ?>&nbsp;</div> <?php previous_post_link(); ?>

</div><!-- END OF ALIGNLEFT -->

<!-- START OF ALIGNRIGHT -->
<div class="alignright">
<div class="postpagination"><?php _e( 'Next Post:', 'featherlite' ); ?>&nbsp;</div><?php next_post_link(); ?> 

</div><!-- END OF ALIGNRIGHT -->

</div><!-- END OF NAVIGATION -->   

<div class="clear"></div>

</div><!-- END OF NAVIGATION WRAPPER -->

<?php if ('open' == $post->comment_status) { ?>

<!-- START OF COMMENT WRAPPER -->
<div class="comment_wrapper">

<!-- START OF COMMENT WRAPPER MAIN -->
<div class="comment_wrapper_main">

<?php comments_template(); ?>
<?php comment_form(); ?>

</div><!-- END OF COMMENT WRAPPER MAIN -->

<div class="clear"></div>

</div><!-- END OF COMMENT WRAPPER -->

<?php } ?> 

<?php get_footer(); ?>