<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add items
add_action( 'init', 'fikso_add_ingredients_post_type', 0 );
function fikso_add_ingredients_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => 'Ingredients',
        'singular_name'       => 'Ingredient',
        'add_new'             => 'Add ingredient',
        'add_new_item'        => 'Add new ingredient',
        'edit_item'           => 'Edit ingredient',
        'new_item'            => 'New ingredient',
        'all_items'           => 'All ingredients',
        'view_item'           => 'View ingredients',
        'update_item'         => 'Update ingredients',
        'search_items'        => 'Search ingredients',
        'not_found'           => 'No ingredients found',
        'not_found_in_trash'  => 'No ingredients found in the trash',
        'parent_item_colon'   => '',
        'menu_name'           => 'Ingredients',
    );

// Set other options for Custom Post Type

    $args = array(
        'labels'              => $labels,
        'description'         => 'Ingredients',
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array('ingredients-tax' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'ingredients' ),
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-carrot',
        'can_export'          => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    );

    // Registering your Custom Post Type
    register_post_type( 'ingredients', $args );

}
