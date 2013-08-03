<!DOCTYPE HTML>

<html <?php language_attributes(); ?>>

<!--[if IE 7 ]>    <html class= "ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class= "ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class= "ie9"> <![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->


<title><?php echo get_option('blogname'); ?><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php 
if ( function_exists( 'get_option_tree') ) {
  $specstyle = get_option_tree( 'vn_specstyle' );
  }
?>
<?php if ($specstyle != ('')){ ?>

<link href="<?php echo ($specstyle); ?>" rel="stylesheet" type="text/css" media="screen" />

<?php } else { ?>

<link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet" type="text/css" media="screen" />

<?php } ?>

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

 <!-- *************************************************************************
*****************                FAVICON               ********************
************************************************************************** -->

<?php 
if ( function_exists( 'get_option_tree') ) {
  $favicon = get_option_tree( 'vn_favicon' );
}
?>
<link rel="shortcut icon" href="<?php echo ($favicon); ?>" />

<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->



<!-- *************************************************************************
*****************             Theme Options              ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $sidebarposition = get_option_tree( 'vn_sidebarposition' );
}
?>

<style type="text/css">
	
div#linkblock {
	position:<?php echo ($sidebarposition); ?>;
	}
	
</style>


<!-- *************************************************************************
*****************              CUSTOM CSS              ********************
************************************************************************** -->


<style type="text/css">
<?php 
if ( function_exists( 'get_option_tree') ) {
  $css = get_option_tree( 'vn_customcss' );
}
?>
<?php echo ($css); ?>
	
</style>

<?php wp_head(); ?> 

</head>

<?php $theme_options = get_option('option_tree'); ?>

<body <?php body_class(); ?>>

<!-- START OF WRAP --> 
<div id="wrap">
  
<!-- START OF MAINCONTENT -->   
<div id="maincontent">

<!-- START OF LINK BLOCK2 -->
<div id="linkblock2">

<!-- START OF SIDE LOGO2 --> 
<div id="side_logo2">
<a href="<?php echo site_url(); ?>"><?php 
if ( function_exists( 'get_option_tree' ) ) {
$logopath = get_option_tree( 'vn_toplogo' );
} ?><img src="<?php echo $logopath; ?>" alt="logo" /></a>

</div><!-- END OF SIDE LOGO2 --> 

<!-- START OF NAV -->
<nav>
      
<?php wp_nav_menu(
array(
'menu_class' => 'nav',
'theme_location'  => 'primary',
)
);
?>

</nav><!-- END OF NAV -->

<?php get_sidebar('smartphone'); ?>

<div class="clearbig"></div>

</div><!-- END OF LINK BLOCK2 -->

<!-- START OF POST -->
<div id="respnav">

</div><!-- END OF POST -->

<!-- START OF ASIDE -->
<aside>

<!-- START OF LINKBLOCK --> 
<div id="linkblock">
     
<!-- START OF SIDE LOGO --> 
<div id="side_logo">
<a href="<?php echo site_url(); ?>"><?php 
if ( function_exists( 'get_option_tree' ) ) {
$logopath = get_option_tree( 'vn_toplogo' );
} ?><img src="<?php echo $logopath; ?>" alt="logo" /></a>

</div><!-- END OF SIDE LOGO --> 

<!-- START OF NAV -->
<nav>
      
<?php wp_nav_menu(
array(
'menu_class' => 'nav',
'theme_location'  => 'primary',
)
);
?>

</nav><!-- END OF NAV -->

<?php get_sidebar(); ?>

<div class="clear"></div>
    
</div><!-- END OF LINKBLOCK --> 


</aside><!-- END OF ASIDE -->