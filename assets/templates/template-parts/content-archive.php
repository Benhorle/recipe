<?php
/**
 * Sussexchef Recipes.
 *
 * This file adds the content for the cases post type.
 *
 * @author  R. Zuidervaart
 * @license GPL-2.0+
 */

$global_fields  = get_field('global_attributes');

    $global_fields_notes    = '';
    $global_fields_video    = '';
    $global_fields_video_block_cookies  = '';

    if($global_fields):

        $global_fields_notes    = $global_fields['notes']; //Repeater
        $global_fields_video    = $global_fields['video']; //oEmbed
        $global_fields_video_block_cookies  = $global_fields['video_block_cookies']; //oEmbed

    endif;


$recipe  = get_field('recipe_info');

    $recipe_servings        = '';
    $recipe_servings_min    = '';
    $recipe_servings_incr   = '';

    $recipe_ingredients     = '';
    $recipe_instructions    = '';

    if( $recipe ):

        $recipe_servings        = $recipe['servings_info']; //Group
        if($recipe_servings):

            $recipe_servings_min    = $recipe_servings['minimum_servings'];
            $recipe_servings_incr   = $recipe_servings['servings_increment'];

        endif;

        $recipe_ingredients     = $recipe['ingredients']; //Repeater
        $recipe_instructions    = $recipe['instructions']; //Repeater

    endif;


?>

<article id="post-<?php the_ID(); ?>" class="col-md-4 recipe-archive__card">
    <header class="entry-header">
        <figure class="post-thumbnail relative">
            <?php the_post_thumbnail('recipe-single'); ?>
            <div class="absolute recipe-archive__card-title--container">
                <?php
                if ( is_singular() ) :
                    the_title( '<h4 class="absolute recipe-archive__card-title entry-title">', '</h4>' );
                else :
                    the_title( sprintf( '<h4 class="absolute recipe-archive__card-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
                endif;

                ?>
            </div>
        </figure><!-- .post-thumbnail -->
    </header><!-- .entry-header -->

    <div class="recipe-archive__card--content">

        <div>
            <small>
                <strong class="">
                    Min servings: <?php echo $recipe_servings_min; ?>
                </strong>
                <?php the_excerpt(); ?>
            </small>
            <?php //echo $post->post_content; ?>
        </div>

        <div class="">

            <div class="recipe__resources">
                <?php include('partials/ingredients-table.php'); ?>
            </div>

            <?php

            ?>
        </div><!-- .entry-content -->

    </div>

    <footer class="entry-footer">

    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
