<?php
/*
Template Name: Photos
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

<?php
$port_query = new WP_Query();
$port_query->query('post_type=portgallery' . '&paged=' . $paged );
?>

<?php while ( $port_query->have_posts() ) : $port_query->the_post(); ?>

<!-- START OF PORTGALLERY WRAPPER -->
<article class="portgallery_wrapper">
<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

<!-- START OF PORTGALLERY -->
<div class="portgallery2">


<!-- START OF PORT TITLE -->
<div class="port_title">
<a href="<?php the_permalink (); ?>"><?php the_title (); ?></a>

</div><!-- END OF PORT TITLE -->

<!-- START OF PORT TYPES LIST -->
<div class="port_types_list">
<?php
$taxonomy = 'types';
  $terms = get_terms( $taxonomy, '' );
  if ($terms) {
    foreach($terms as $term) {
        echo '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( 'View all posts in %s', 'featherlite' ), $term->name ) . '" ' . '>' . $term->name.'</a> ';
    }
  } ?>
        
</div><!-- END OF PORT TYPES LIST -->

</div><!-- END OF PORTGALLERY -->

</article><!-- END OF PORTGALLERY WRAPPER -->

<?php endwhile; ?> 

</div><!-- END OF CONTENT -->

<!-- Start of pagination -->
<div class="pagination">
<?php if (function_exists("pagination")) {
    pagination($port_query->max_num_pages);
} ?>

</div><!-- End of pagination -->

<?php wp_reset_query(); ?>

<?php get_footer(); ?>