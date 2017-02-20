<?php
/*
Plugin Name: iBar
Plugin URI: https://linesh.com/projects/ibar/
Description: This is a Mac OSX Menubar like WordPres adminbar/toolbar theme, designed for Mac and WordPress lovers.
Version: 17.02
Author: Linesh Jose
Author URI:https://linesh.com/
License: GPL2
*/

// initialize iBar ------------->
add_action('init','init_ibar_options');
function init_ibar_options(){	
	add_action('wp_head', 'ibar_styles');
	add_action('login_head', 'ibar_styles');
	add_action('admin_enqueue_scripts', 'ibar_styles');
}


// Set default css styles ---------------->
function ibar_styles(){
	wp_enqueue_style( 'ibar-style',plugin_dir_url(__FILE__). 'style.css',false,NULL,false );
}
	
// Adding meta links in plugins page ------------------->
add_filter( 'plugin_row_meta', 'ibar_plugin_actions', 10, 2 ); 	
function ibar_plugin_actions( $links, $file ){
	$plugin = plugin_basename( plugin_dir_path(__FILE__).'index.php');
	if ($file == $plugin){
		$links[] = '<a href="https://linesh.com/make-a-donation/" target="_blank"><span class="dashicons dashicons-heart"></span>'. __('Donate','ibar').'</a>';
		$links[] = '<a href="https://linesh.com/forums/forum/plugins/ibar/" target="_blank"><span class="dashicons dashicons-sos"></span>'. __('Support','ibar').'</a>';
	}
	return $links;
}
?>