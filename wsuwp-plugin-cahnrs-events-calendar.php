<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       CAHNRS Events Calendar Functionality
 * Plugin URI:        https://cahnrs.wsu.edu/
 * Description:       Custom functionality for The Events Calendar Plugin
 * Version:           1.0.0
 * Author:            CAHNRS Communications
 * Author URI:        https://cahnrs.wsu.edu/
 * Text Domain:       cahnrs-events-calendar-plugin
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

//Define the version of this CAHNRS Gutenberg plugin
define( 'CAHNRSEVENTSPLUGINVERSION', '1.0' );

// Gets CAHNRS Gutenberg plugin URL.
function _get_cahnrs_events_plugin_url() {
  static $cahnrs_events_plugin_url;

  if (empty($cahnrs_events_plugin_url)) {
    $cahnrs_events_plugin_url = plugin_dir_path( __FILE__ );
  }

  return $cahnrs_events_plugin_url;
}

//Load other files of this plugin
function cahnrs_events_init(){
	require_once __DIR__ . '/includes/plugin.php';
}

add_action( 'plugins_loaded', 'cahnrs_events_init' );