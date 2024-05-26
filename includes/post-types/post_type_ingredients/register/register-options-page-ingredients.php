<?php
if( function_exists('acf_add_options_page') )
{
    acf_add_options_page(array(
        'page_title'    => 'Ingredients options',
        'menu_title'    => 'Ingredients options',
        'menu_slug'     => 'options_ingredients',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'edit.php?post_type=ingredients',
        'position'      => false,
        'redirect'      => false,
    ));
}