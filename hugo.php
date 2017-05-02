<?php 
/*
	Plugin Name: Hugo
	Description: Plugin for creating referrals to Hugo, using an easy form-based interface.
	Author:      More Awesome B.V.
	Author URI:  http://www.moreawesome.co/
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once( plugin_dir_path( __FILE__ ) . '/hugo-view.php' );
require_once( plugin_dir_path( __FILE__ ) . '/hugo-submit-referral.php' );

function hugo_scripts() {
    wp_enqueue_style( 'bootstrap-style', plugins_url( '/style/bootstrap.min.css' , __FILE__ ) );
    wp_enqueue_style( 'hugo-style', plugins_url( '/style/hugo.css' , __FILE__ ) );
    wp_enqueue_script( 'bootstrap-script', plugins_url( '/script/bootstrap.min.js' , __FILE__ ), array(), '1.0.0', true );
    wp_enqueue_script( 'hugo-script', plugins_url( '/script/hugo.js' , __FILE__ ), array(), '1.0.0', true );
    wp_enqueue_script( 'validator', plugins_url( '/script/validator.min.js' , __FILE__ ), array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'hugo_scripts' );
add_action( 'wp_ajax_hugo_submit_referral', 'hugo_submit_referral' );

add_shortcode('hugo', 'hugo_link_shortcode');
?>