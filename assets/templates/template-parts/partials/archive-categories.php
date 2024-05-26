<?php
/**
 * Academy Pro
 *
 * This file handles the logic and templating for outputting the categories on the archive pages.
 *
 * @package Academy
 * @author  Ruben Zuidervaart
 * @license GPL-2.0+
 * @link    www.fikso.nl
 */

$postType = 'recipes';

?>


<?php
$args = array(
    "type"              => $postType,
    "hide_empty"        => "0",
    "show_count"        => "1",
    "exclude_tree"      => "1",
    "current_category"  => "1",
    "orderby"           => "name",
    "order"             => "ASC"
);
$categories = get_categories( $args );
foreach ( $categories as $category ) {
    if($cat != $category->term_id) { echo '<a class="d-flex articles-category articles-category--inarchive background__transparent color--primary border border--primary large-text text-xs--small" href="' . get_category_link( $category->term_id ) . '" rel="bookmark">' . $category->name . '<span class="articles-category--count">' . $category->count . '</span></a>'; }
    else { echo '<a class="d-flex articles-category articles-category--inarchive background__primary color--white border border--primary large-text text-xs--small" href="' . get_category_link( $category->term_id ) . '" rel="bookmark">' . $category->name . '<span class="articles-category--count">' . $category->count . '</span></a>'; }
}

?>