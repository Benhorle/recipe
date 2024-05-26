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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="row">
            <div class="col-md-7">
                <figure class="post-thumbnail">
                    <?php the_post_thumbnail('recipe-single'); ?>
                </figure><!-- .post-thumbnail -->
            </div>
            <div class="col-md-5">
                <div>
                    <?php
                    if ( is_sticky() && is_home() && ! is_paged() ) {
                        printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'sussexchef_recipes' ) );
                    }
                    if ( is_singular() ) :
                        the_title( '<h1 class="">', '</h1>' );
                    else :
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    endif;
                    ?>
                    <small>
                        <strong class="">
                            Min servings: <?php echo $recipe_servings_min; ?>
                        </strong>
                        <?php the_excerpt(); ?>
                    </small>
                </div>
                <div>
                    <?php echo $post->post_content; ?>
                </div>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="recipe--content row entry-content">
        <div class="recipe--hassidebar col-md-9">

            <div class="recipe__resources">
                <?php include('partials/ingredients-table.php'); ?>
            </div>

            <div class="recipe__instructions">
                <div class="recipe__instructions--inner">
                    <div class="recipe__instructions--inner-line">

                    </div>
                    <?php
                    if($recipe_instructions):
                        foreach( $recipe_instructions as $instruction) {
                            $title      = $instruction['title'];
                            $content    = $instruction['description'];
                            $image      = $instruction['image'];
                            $duration   = $instruction['duration'];
                            ?>
                            <div class="recipe__instructions--card-container">
                                <div class="recipe__instructions--card">
                                    <div class="recipe__instructions--card-inner">
                                        <?php if($image): ?>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="<?php echo $image['url']; ?>" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="recipe__instructions--content">
                                                        <h5 class="recipe__instructions--title">
                                                            <?php echo $title; ?>
                                                        </h5>
                                                        <?php echo $content; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="recipe__instructions--content">
                                                <h5 class="recipe__instructions--title">
                                                    <?php echo $title; ?>
                                                </h5>
                                                <?php echo $content; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="recipe__instructions--card-duration">
                                    <div class="recipe__instructions--card-time">
                                        <?php echo $duration; ?>m
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    endif;
                    ?>
                </div>
            </div>

            <div class="recipe__video">
                <?php
                if($global_fields_video):
                    echo $global_fields_video;
                endif;
                ?>
            </div>


            <?php

            ?>
        </div><!-- .entry-content -->



        <aside id="secondary" class="recipe--sidebar col-md-3" role="complementary" aria-label="Recipes Sidebar">

            <?php
            if($global_fields_notes):
                foreach( $global_fields_notes as $note) {
                    $title      = $note['title'];
                    $content    = $note['note'];
                    ?>
                    <div class="recipe__note--card">
                        <div class="recipe__note--card-inner">
                            <h5 class="recipe__note--title">
                                <?php echo $title; ?>
                            </h5>
                            <div class="recipe__note--content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            endif;
            ?>

        </aside>
    </div>

    <footer class="entry-footer">

    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
