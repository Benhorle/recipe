<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Add items
add_action( 'init', 'fikso_add_recipe_post_type', 0 );
function fikso_add_recipe_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => 'Recipes',
        'singular_name'       => 'Recipe',
        'add_new'             => 'Add new recipe',
        'add_new_item'        => 'Add new recipe',
        'edit_item'           => 'Edit recipe',
        'new_item'            => 'New recipe',
        'all_items'           => 'All recipes',
        'view_item'           => 'View recipes',
        'update_item'         => 'Update recipe',
        'search_items'        => 'Find recipes',
        'not_found'           => 'No recipes found',
        'not_found_in_trash'  => 'No recipes found in the trash',
        'parent_item_colon'   => '',
        'menu_name'           => 'Recipes',
    );

// Set other options for Custom Post Type

    $args = array(
        'labels'              => $labels,
        'description'         => 'Recipes',
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array('recipes-tax' ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'recipes' ),
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-book-alt',
        'can_export'          => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
    );

    // Registering your Custom Post Type
    register_post_type( 'recipes', $args );

}