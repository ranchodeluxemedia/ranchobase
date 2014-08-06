<?php

// Setup global defaults
global $plugin_slug, $plugin_version, $plugin_url;
$plugin_slug = basename( dirname( __FILE__ ) );
$plugin_version = '1.0.0';
$plugin_url = plugins_url( $plugin_slug );

// Register Plugin Activation
register_activation_hook( __FILE__, 'my_branding_activate' );
function my_branding_activate() {
  global $plugin_slug, $plugin_version;
  $options = array(
    'version' => $plugin_version,
  );
  update_option( $plugin_slug, $options );
}

register_deactivation_hook( __FILE__, 'my_branding_deactivate' );
function my_branding_dectivate(){
  // TODO...
}

add_action( 'plugins_loaded', 'my_branding_setup' );
function my_branding_setup() {
  // TODO
}

add_action( 'init', 'my_branding_init' );
function my_branding_init() {

  add_action( 'login_head', 'my_branding_init' );

  add_filter( 'login_headertitle', 'custom_login_header_title' );

  add_filter( 'login_headerurl', 'custom_login_header_url' );

  add_filter( 'login_errors', 'custom_login_error' );

}

add_action( 'admin_menu', 'my_branding_admin_init' );
function my_branding_admin_init() {

  add_action( 'admin_footer_text', 'my_admin_footer_text' );

  add_filter( 'wp_dashboard_setup', 'remove_dashboard_metaboxes' );

  add_filter( 'admin_bar_menu', 'remove_logo_from_admin_bar', 999 );

}

function my_admin_footer_text() {
  echo 'Powered by <a href="http://ranchodeluxemedia.com" target="_blank" title="Nashville, Tennessee Web Development">Rancho Deluxe Media</a> using WordPress and ramen noodles.';
}

function custom_login_header_title() {
  return get_bloginfo( 'name' ) . ' - Powered by Rancho Deluxe Media';
}

function custom_login_error() {
  return 'Login error. Please try again.';
}

function remove_dashboard_metaboxes() {
  global $wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}

function remove_logo_from_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_node( 'wp-logo' );
}
