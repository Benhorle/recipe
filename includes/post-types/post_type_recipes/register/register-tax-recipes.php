<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'fikso_add_recipes_tax' );
function fikso_add_recipes_tax() {
    // create a new taxonomy
    register_taxonomy(
        'recipes-tax-tastes',
        'recipes',
        array(
            'label' => __( 'Tastes', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'recipes' ),
            'hierarchical' => true,
        )
    );

    register_taxonomy(
        'recipes-tax-cuisines',
        'recipes',
        array(
            'label' => __( 'Cuisines', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'recipes' ),
            'hierarchical' => true,
        )
    );

    register_taxonomy(
        'recipes-tax-countries',
        'recipes',
        array(
            'label' => __( 'Countries', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'recipes' ),
            'hierarchical' => true,
        )
    );
}
