<?php  
/* 
Template Name: Sitemap 
*/  
?>

<?php get_header(); ?>

<!-- START OF PAGE_WRAP --> 
<div id="page_wrap">
     
<!-- START OF CONTROL --> 
<div id="control">
<a id="controlbtn" class="open" href="#" alt="Show/View your stuffs"></a>

</div><!-- END OF CONTROL --> 

<!-- START OF CONTENT --> 
<div class="content">

<h1><?php _e( 'Sitemap', 'featherlite' ); ?></h1>

<!-- START OF SECTION -->
<section>

<!-- START OF ONE THIRD COLUMN FIRST -->
<div class="vnthreecolumnfirst">

<!-- START OF ARTICLE -->
<article>
<h6><?php _e( 'Categories', 'featherlite' ); ?></h6>

<ul>

<?php $args = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 1,
    'hide_empty'         => 1,
    'use_desc_for_title' => 0,
    'child_of'           => 0,
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => true,
    'title_li'           => '',
    'show_option_none'   => __('No categories', 'featherlite'),
    'number'             => NULL,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => 'Walker_Category' ); ?> 
	
	<?php wp_list_categories( $args ); ?>
    
</ul>

</article><!-- END OF ARTICLE -->

<h6><?php _e( 'Feeds', 'featherlite' ); ?></h6>

<ul>

<li><a title="<?php _e( 'Full content', 'featherlite' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'featherlite' ); ?></a></li>
<li><a title="<?php _e( 'Comment Feed', 'featherlite' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'featherlite' ); ?></a></li>

</ul>

<h6><?php _e( 'Archives', 'featherlite' ); ?></h6>

<ul>

<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    
</ul>

</div><!-- END OF ONE THIRD COLUMN FIRST -->

<!-- START OF ONE THIRD COLUMN -->
<div class="vnthreecolumn">

<!-- START OF ARTICLE -->
<article>
<h6><?php _e( 'Pages', 'featherlite' ); ?></h6>

<ul>
<?php wp_list_pages("title_li=" ); ?>

</ul>

</article><!-- END OF ARTICLE -->

</div><!-- END OF ONE THIRD COLUMN -->

<!-- START OF ONE THIRD COLUMN -->
<div class="vnthreecolumn">

<!-- START OF ARTICLE -->
<article>
<h6><?php _e( 'All Blog Posts', 'featherlite' ); ?></h6>

<ul>

<?php $archive_query = new WP_Query('showposts=1000&cat=-8');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'featherlite' ); ?><?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>

<?php endwhile; ?>
    
</ul>

</article><!-- END OF ARTICLE -->

</div><!-- END OF ONE THIRD COLUMN -->

<!-- Clear Fix --><div class="clear"></div>

</section><!-- END OF SECTION -->
           
<?php get_footer(); ?>