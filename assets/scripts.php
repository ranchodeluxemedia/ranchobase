<?php

function rdmbase_custom_scripts() {

    //adding smoothscroll file in the footer
    //wp_enqueue_script( 'rdmbase-smoothscroll', get_stylesheet_directory_uri() . '/assets/js/plugins/smoothscroll.min.js', array( 'jquery' ), '', true );
    //adding appear file in the footer
    wp_enqueue_script( 'rdmbase-appearjs', get_stylesheet_directory_uri() . '/assets/js/plugins/appear.min.js', array( 'jquery' ), '', true );
    //adding backbone file in the footer
    wp_enqueue_script( 'rdmbase-backbone', get_stylesheet_directory_uri() . '/assets/js/plugins/backbone.js', array( 'jquery' ), '', true );
    //adding animations file in the footer
    wp_enqueue_script( 'rdmbase-animations', get_stylesheet_directory_uri() . '/assets/js/plugins/animations.min.js', array( 'jquery' ), '', true );

}

add_action( 'wp_enqueue_scripts', 'rdmbase_custom_scripts' );

function replace_wp_script()
{
  $script = 'jquery';
  $url = "//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js";
  wp_deregister_script($script);
  wp_register_script($script, $url);
  wp_enqueue_script($script);
}
add_action('wp', 'replace_wp_script', 100);
