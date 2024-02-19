<?php

function toms_theme_enqueue_styles() {
  wp_enqueue_style( 'toms-theme-style', get_stylesheet_uri() );
  wp_enqueue_style( 'init-style', get_stylesheet_directory_uri() . '/styles/init.css' );
  wp_enqueue_style( 'media-style', get_stylesheet_directory_uri() . '/styles/media.css' );
}

add_action( 'wp_enqueue_scripts', 'toms_theme_enqueue_styles' );

?>
