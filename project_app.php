<?php
/*
Plugin Name: Project2App
Plugin URI: https://project2app.com/
Description: Turn your WordPress website into a mobile app within minutes
Version: 2.0.2
Author: Joshua
Author URI: https://project2app.com/
Text Domain: project-app
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function project_app_app_plugin_init() {
	load_plugin_textdomain( 'project-app', false, 'project-app/languages' ); //making plugin translation ready
}
add_action('init', 'project_app_app_plugin_init');
//required back-end files
    require_once(plugin_dir_path(__FILE__) . 'titan-framework/titan-framework-embedder.php' ); //including titan framework
	require_once(plugin_dir_path(__FILE__) . "inc/admin_menu.php"); //admin menus (app_settings.php customizer_page.php push.php)
	require_once(plugin_dir_path(__FILE__) . "inc/mw.php");
	
//required front-end files
	require_once(plugin_dir_path(__FILE__) . 'inc/url.php' ); 
	require_once(plugin_dir_path(__FILE__) . "inc/key.php");
    
	add_action( 'init', 'project_app_app_mw_init' ); //mw.php
	add_action( 'admin_enqueue_scripts', 'project_app_enqueue_scripts' );
    add_action('plugins_loaded', 'project_app_url'); //url.php

function project_app_enqueue_scripts() {
    wp_enqueue_style('project_app_iphone-device', plugin_dir_url( __FILE__ ) . 'css/devices.min.css' );
    wp_enqueue_style('project_app_customizer_css', plugin_dir_url( __FILE__ ) . 'css/customizer.css' );
    wp_enqueue_script('project_app_customizer_js', plugin_dir_url( __FILE__ ) . 'js/customizer.js' );
}
?>
