<?php
/**
 * @package Ascetica Child
 * @subpackage Functions
 * @version 0.1
 * @author Galin Simeonov
 * @link http://alienwp.com
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */

/* Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'ascetica_child_theme_setup', 11 );

function ascetica_child_theme_setup() {
	
	/* Get action/filter hook prefix. */
	$prefix = hybrid_get_prefix();
	
	/* Example action. */
	// add_action( "{$prefix}_header", 'ascetica_child_example_action' );

	/* Example filter. */
	// add_filter( "{$prefix}_site_title", 'ascetica_child_example_filter' );	
		
}

?>