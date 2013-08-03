<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'setup',
        'title'       => __( 'Setup', 'featherlite' )
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'vn_toplogo',
        'label'       => __( 'Top Logo', 'featherlite' ),
        'desc'        => __( '<strong>Upload your logo</strong><br /><br />Width no larger than 250px!', 'featherlite' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_favicon',
        'label'       => __( 'Favicon', 'featherlite' ),
        'desc'        => __( '<strong>Upload your favicon.</strong><br /><br /> Use a transparent PNG file 16px x 16px.', 'featherlite' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_specstyle',
        'label'       => __( 'Upload Special Stylesheet', 'featherlite' ),
        'desc'        => __( '<strong>Upload the color selected stylesheet.</strong>', 'featherlite' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_customcss',
        'label'       => __( 'Custom CSS', 'featherlite' ),
        'desc'        => __( '<strong>Use this area to over ride any CSS from the stylesheet with your own custom CSS.</strong>', 'featherlite' ),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_tracking',
        'label'       => __( 'Analytics Code', 'featherlite' ),
        'desc'        => __( '<strong>Enter your analytics code script (such as Google Analytics) here that will be injected into every page for better analytics.</strong>', 'featherlite' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_sidebarposition',
        'label'       => 'Sidebar Setting',
        'desc'        => '<strong>Choose how you wish your pull out sidebar to display, Fixed or Relative.</strong>  <br /><br />Fixed position means it will not scroll with the page (Use fixed if you do not have many sidebar widgets and/or menu items.) <br /><br />Relative means it will scroll with the page and adapt in height for the content (Use relative if you have a large menu and many widgets)',
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'fixed',
            'label'       => 'Fixed',
            'src'         => ''
          ),
          array(
            'value'       => 'relative',
            'label'       => 'Relative',
            'src'         => ''
          )
        ),
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}