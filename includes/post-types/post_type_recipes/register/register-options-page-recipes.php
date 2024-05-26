<?php
if( function_exists('acf_add_options_page') )
{
    acf_add_options_page(array(
        'page_title'    => 'Recipes options',
        'menu_title'    => 'Recipes options',
        'menu_slug'     => 'options_recipes',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'edit.php?post_type=recipes',
        'position'      => false,
        'redirect'      => false,
    ));
}