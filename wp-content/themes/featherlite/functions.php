<?php


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Featured Image Functionality     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_theme_support( 'post-thumbnails' );
add_image_size( 'slide', 980, 980, false );



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Include tiny mce for shortcode buttons     //////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
include('tinyMCE.php');





////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Shortcodes    ///////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


//	video
add_shortcode('videocontainer', 'tws_videocontainer');

function tws_videocontainer($atts, $content = null) {
	return '<div class="videocontainer">' .do_shortcode($content).'</div>';
}




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     WP Tag Cloud     //////////////////////////////////////////////// 
////////////////////////////////////////////////////////////////////////////////////////////
add_filter( 'wp_tag_cloud', 'remove_tag_cloud', 10, 2 );

function remove_tag_cloud ( $return, $args )
{
        return false;
}



function mytheme_tags() {
			
$tags = get_tags();
foreach ($tags as $tag) {
$tag_link = get_tag_link($tag->term_id);
$html = '<div class="button_tag">';
$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
$html .= "{$tag->name}</a>";
$html .= '</div>';
echo $html;
}
}
	
add_filter('widget_tag_cloud_args', 'mytheme_tags');	





////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Prev & Next Buttons    //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="button arrow_left"';
}
function posts_link_attributes_2() {
    return 'class="button arrow_right"';
}



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Post Format     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_theme_support( 'post-formats', array( 'audio', 'link', 'gallery', 'video', 'quote' ) );



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     2 WP Nav Menus     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
register_nav_menus( array(  
  'primary' => __( 'Primary Navigation', 'featherlite' ),
  'customone' => __('Custom 1 Menu', 'featherlite'),  
  'customtwo' => __('Custom 2 Menu', 'featherlite') 
) );  	



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Setting up Option Tree includes     /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
/* START OPTION TREE */ 
add_filter( 'ot_show_pages', '__return_false' );  
add_filter( 'ot_theme_mode', '__return_true' );
//add_filter( 'ot_show_pages', '__return_true' );  
//add_filter( 'ot_theme_mode', '__return_false' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'functions/theme-options.php' );



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Comments     ////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
   <div class="comment-author-avatar">
   <?php echo get_avatar($comment, 35); ?>
         
   </div>
   
   <div class="comment-main">
   
     <div class="comment-meta">
     <?php printf(__('<span class="comment-author">%s</span>', 'featherlite'), get_comment_author()) ?>
     <br />
     <span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
	 <?php printf(__('%1$s', 'featherlite'), get_comment_date('M j, Y')) ?></a>
     </span>
     </div> 
     
     </div>  
     
     <div class="comment-content">      
     <?php if ($comment->comment_approved == '0') : ?>
     <p><em><?php _e('Your comment is awaiting moderation.', 'featherlite') ?></em></p>
     <?php comment_text() ?>
 
     </div> 
     
     <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     
     
     
     
     <?php else : { ?>
 
     <?php comment_text() ?>  
     
     <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     
     <?php } ?>  
     
	 <?php endif; ?>
	 
     
     
     <?php
       }
				
	
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Content width set     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) ) 
    $content_width = 980;
		

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Text Domain     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
load_theme_textdomain ('featherlite');



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Multi Language Ready     ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
load_theme_textdomain( 'featherlite', get_template_directory().'/languages' );

$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Contact Form 7     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Functions:	Optimize and style Contact Form 7 - WPCF7
 *
 */
// Remove the default Contact Form 7 Stylesheet
function remove_wpcf7_stylesheet() {
	remove_action( 'wp_head', 'wpcf7_wp_head' );
}

// Add the Contact Form 7 scripts on selected pages
function add_wpcf7_scripts() {
	if ( is_page('contact') )
		wpcf7_enqueue_scripts();
}

// Change the URL to the ajax-loader image
function change_wpcf7_ajax_loader($content) {
	if ( is_page('contact') ) {
		$string = $content;
		$pattern = '/(<img class="ajax-loader" style="visibility: hidden;" alt="ajax loader" src=")(.*)(" \/>)/i';
		$replacement = "$1".get_template_directory_uri()."/images/ajax-loader.gif$3";
		$content =  preg_replace($pattern, $replacement, $string);
	}
	return $content;
}

// If the Contact Form 7 Exists, do the tweaks
if ( function_exists('wpcf7_contact_form') ) {
	if ( ! is_admin() && WPCF7_LOAD_JS )
		remove_action( 'init', 'wpcf7_enqueue_scripts' );

	add_action( 'wp', 'add_wpcf7_scripts' );
	add_action( 'init' , 'remove_wpcf7_stylesheet' );
	add_filter( 'the_content', 'change_wpcf7_ajax_loader', 100 );
}





////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Include post and page in search     /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'page'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////              RSS Feed Links             /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_theme_support( 'automatic-feed-links' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove the jump on read more     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Load JS & Stylesheet Scripts     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
include_once( 'functions/theme-scripts.php' );




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Theme Options for widget     ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
include_once( 'functions/theme-options-widgets.php' );




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     PAGINATION     //////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function pagination($pages = '', $range = 1)
{ 
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Página ".$paged." de ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; Primera</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Última &raquo;</a>";
         echo "</div>\n";
     }
}





////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Change excerpt length     ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


////////////////////////////////////////////////////////////////////////////////////////////
/////////////////    Extract first occurance of text from a string     /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
// Extract first occurance of text from a string
function my_extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}


function get_content_link( $content = false, $echo = false )
{
    // allows using this function also for excerpts
    if ( $content === false )
        $content = get_the_content(); // You could also use $GLOBALS['post']->post_content;

    $content = preg_match_all( '/href\s*=\s*[\"\']([^\"\']+)/', $content, $links );
    $content = $links[1][0];
    $content = make_clickable( $content );

    // if you set the 2nd arg to true, you'll echo the output, else just return for later usage
    if ( $echo === true )
        echo $content;

    return $content;
}




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove height/width on images for responsive     ////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////              Exclude thumbnail from gallery              ////////////
////////////////////////////////////////////////////////////////////////////////////////////
function exclude_thumbnail_from_gallery($null, $attr)
{
    if (!$thumbnail_ID = get_post_thumbnail_id())
        return $null; // no point carrying on if no thumbnail ID

    // temporarily remove the filter, otherwise endless loop!
    remove_filter('post_gallery', 'exclude_thumbnail_from_gallery');

    // pop in our excluded thumbnail
    if (!isset($attr['exclude']) || empty($attr['exclude']))
        $attr['exclude'] = array($thumbnail_ID);
    elseif (is_array($attr['exclude']))
        $attr['exclude'][] = $thumbnail_ID;

    // now manually invoke the shortcode handler
    $gallery = gallery_shortcode($attr);

    // add the filter back
    add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);

    // return output to the calling instance of gallery_shortcode()
    return $gallery;
}
add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////    Link Extraction for Post Format Link     /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
// Extract first occurance of text from a string
if( !function_exists ('extract_from_string') ) :
function extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}
endif;




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Allow Shortcodes in Widgets     /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_filter('widget_text', 'do_shortcode');




////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////          Trim The Excerpt           /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function trim_excerpt($text) {
  //return rtrim($text,'[...]');
    return $text;
}
add_filter('get_the_excerpt', 'trim_excerpt');



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Gallery post type     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_action('init', 'create_portgallery');

function create_portgallery() {
    	$portgallery_args = array(
        	'label' => __('Galleries', 'featherlite'),
        	'singular_label' => __('Gallery Item', 'featherlite'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => array('slug' => __('galleries', 'featherlite')) ,
        	'supports' => array('title', 'editor', 'thumbnail', 'comments')
        );
    	register_post_type('portgallery',$portgallery_args);
	}



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Custom taxonomies     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_action( 'init', 'types', 0 );
function types()	{
	register_taxonomy( 
		'types', 
		'portgallery', 
			array( 
				'hierarchical' => true, 
				'label' => __('Gallery Category', 'featherlite'), 
				'query_var' => true, 
				'rewrite' => array( 'slug' => 'gallery-cat' ),
			) 
	);
 
}

/**
 * List taxonomies as categories
 */

class Portfolio_Walker extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  $link = '<a href="#" data-value="term-'.$category->term_id.'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all items filed under %s', 'featherlite' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a><span class="border"></span><span class="sep"></span>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s', 'featherlite' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class=" ';
          $class = 'segment-'.$category->term_id.' cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  $class . '"';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}




?>