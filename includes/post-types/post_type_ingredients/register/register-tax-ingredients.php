<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'fikso_add_ingredients_tax' );
function fikso_add_ingredients_tax() {
    // create a new taxonomy
    register_taxonomy(
        'ingredients-tax-tastes',
        'ingredients',
        array(
            'label' => __( 'Tastes', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'ingredients' ),
            'hierarchical' => true,
        )
    );

    register_taxonomy(
        'ingredients-tax-cuisines',
        'ingredients',
        array(
            'label' => __( 'Cuisines', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'ingredients' ),
            'hierarchical' => true,
        )
    );

    register_taxonomy(
        'ingredients-tax-countries',
        'ingredients',
        array(
            'label' => __( 'Countries', 'sussexchef_recipes' ),
            'rewrite' => array( 'slug' => 'ingredients' ),
            'hierarchical' => true,
        )
    );
}