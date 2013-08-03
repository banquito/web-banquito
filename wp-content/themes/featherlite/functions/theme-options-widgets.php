<?php
if ( function_exists('register_sidebars') ) {
register_sidebar(array(
	'name' => __( 'Desktop/Tablet Sidebar', 'featherlite' ),
	'id' => 'side',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
register_sidebar(array(
	'name' => __( 'SmartPhone Sidebar', 'featherlite' ),
	'id' => 'sidesmart',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
));
}
?>