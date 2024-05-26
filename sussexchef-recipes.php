<?php

define( 'PLUGIN_VERSION', '1.0.3' );

/**
 * Plugin Name: Sussexchef Recipes and ingredients
 * Text Domain: sussexchef_recipes
 * Description: Custom plugin for recipes and ingredients
 * Author: R. Zuidervaart
 * Bewerkers: R. Zuidervaart
 * Author URI: https://www.fikso.nl
 * Version: 0.1.3
 * Copyright: (c) 2019 R. Zuidervaart
 * @author    R. Zuidervaart
 * @copyright Copyright (c) 2019, R. Zuidervaart
 *
 * License: GPL2.0+
 *
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Load ACF
require_once( 'load-acf.php' );


/* Main functions */
require_once( plugin_dir_path( __FILE__ ) . 'includes/includes.php' );


/* Filter the single_template with our custom function*/
//add_filter('single_template', 'recipe_custom_template');

function recipe_custom_template($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'recipes' ) {
        if ( file_exists( '/assets/templates/single-recipes.php' ) ) {
            return '/assets/templates/single-recipes.php';
        }
    }

    return $single;

}

add_filter( 'single_template', 'recipe_post_type_template' );
add_filter( 'archive_template', 'recipe_post_type_template' );
function recipe_post_type_template($template) {
    global $post;

    if ($post->post_type == 'recipes' ) {
        if( is_single() ):
            $template = dirname( __FILE__ ) . '/assets/templates/single-recipes.php';
        elseif( is_archive() ):
            $template = dirname( __FILE__ ) . '/assets/templates/archive-recipes.php';
        endif;
    }
    return $template;

}

//Add styles
/**
 * Add the styles and scripts of the plugin.
 * For the documentation on the used css framework: http://hugeinc.github.io/flexboxgrid-sass/
 */
function sussexchef_styles_and_scripts() {
    wp_enqueue_style( 'sussexchef_styles', plugins_url() . '/sussexchef-recipes/build/css/style.css', array(),PLUGIN_VERSION );
    wp_enqueue_script( 'sussexchef_scripts', plugins_url() . '/sussexchef-recipes/build/js/ingredient-calculator.min.js', array ( 'jquery' ), PLUGIN_VERSION );
}

add_action( 'wp_enqueue_scripts', 'sussexchef_styles_and_scripts' );