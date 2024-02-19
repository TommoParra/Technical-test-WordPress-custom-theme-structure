<?php

//Stylesheets 
function toms_theme_enqueue_styles() {
  wp_enqueue_style( 'toms-theme-style', get_stylesheet_uri() );
  wp_enqueue_style( 'init-style', get_stylesheet_directory_uri() . '/styles/init.css' );
  wp_enqueue_style( 'media-style', get_stylesheet_directory_uri() . '/styles/media.css' );
}

add_action( 'wp_enqueue_scripts', 'toms_theme_enqueue_styles' );


//Register theme features
function custom_theme_features()  {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-thumbnails', array( 'libro' ) );
}

add_action('after_setup_theme', 'custom_theme_features');




//Post type libro 
function registrar_custom_post_type_libro() {
  $labels = array(
      'name'               => 'Libros',
      'singular_name'      => 'Libro',
      'menu_name'          => 'Libros',
      'name_admin_bar'     => 'Libro',
      'add_new'            => 'Añadir Nuevo',
      'add_new_item'       => 'Añadir Nuevo Libro',
      'new_item'           => 'Nuevo Libro',
      'edit_item'          => 'Editar Libro',
      'view_item'          => 'Ver Libro',
      'all_items'          => 'Todos los Libros',
      'search_items'       => 'Buscar Libros',
      'parent_item_colon'  => 'Libros Padres:',
      'not_found'          => 'No se encontraron libros.',
      'not_found_in_trash' => 'No se encontraron libros en la papelera.'
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'libro' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies'         => array( 'genero' ) // Change taxonomy name to 'genero'
  );

  register_post_type( 'libro', $args );
}

//Genero
function registrar_taxonomia_genero() {
  $labels = array(
    'name'                       => 'Género',
    'singular_name'              => 'Género',
    'search_items'               => 'Buscar Géneros',
    'popular_items'              => 'Géneros Populares',
    'all_items'                  => 'Todos los Géneros',
    'edit_item'                  => 'Editar Género',
    'update_item'                => 'Actualizar Género',
    'add_new_item'               => 'Añadir Nuevo Género',
    'new_item_name'              => 'Nuevo Nombre del Género',
    'separate_items_with_commas' => 'Separar géneros con comas',
    'add_or_remove_items'        => 'Añadir o eliminar géneros',
    'choose_from_most_used'      => 'Elegir de los más usados',
    'not_found'                  => 'No se encontraron géneros',
    'menu_name'                  => 'Género',
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'genero' ),
  );

  register_taxonomy( 'genero', 'libro', $args );
}

add_action( 'init', 'registrar_taxonomia_genero' );
add_action( 'init', 'registrar_custom_post_type_libro' );


?>