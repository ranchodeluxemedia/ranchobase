<?php
// Adding custom widgets to the Admin Dashboard

class Rancho_Dashboard_Widgets {

  function __construct() {
    add_action( 'wp_dashboard_setup', array( $this, 'remove_dashboard_widgets' ) );
    add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widgets' ) );
  }

  function remove_dashboard_widgets() {
      // Nothing here yet, sparky...
  }

  function add_dashboard_widgets() {

  }

}

$rdw = new Rancho_Dashboard_Widgets();
