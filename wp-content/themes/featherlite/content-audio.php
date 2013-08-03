<?php
/*
 * The default template for displaying audio
 */
?>

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

<img src="<?php echo get_template_directory_uri(); ?>/img/audio_icon.png" width="31" height="24" alt="<?php _e( 'audio post', 'featherlite' ); ?>" />

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

</div><!-- END OF COMMENT COUNT-->

<?php } ?>

<!-- START OF POST DATE -->
<div class="post_date">
<?php the_time('F j, Y') ?>

</div><!-- END OF POST DATE -->

</div><!-- END OF POST DETAILS -->

<?php the_excerpt (); ?>

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


<!-- START OF READ MORE -->
<div class="post_read_more">
<a href="<?php the_permalink (); ?>"><?php _e( 'Read More', 'featherlite' ); ?></a>

</div><!-- END OF READ MORE -->

<hr  />

</div><!-- END OF CONTENT -->

</div><!-- END OF POST CLASS -->

</div><!-- END OF BLOG WRAPPER -->