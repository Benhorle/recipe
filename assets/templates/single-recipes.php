<?php
/**
 * Sussexchef Recipes.
 *
 * This file adds the custom single page for the recipes post type.
 *
 * @author  R. Zuidervaart
 * @license GPL-2.0+
 */

get_header();
?>

<div id="" class="content-area wrap">
    <main id="main" class="" role="main">
        <?php
        // Start the loop.
        while ( have_posts() ) :

            include('template-parts/content-single.php');

            the_post();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

            // Previous/next post navigation.
            the_post_navigation(
                array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'sussexchef_recipes' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Next post:', 'sussexchef_recipes' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'sussexchef_recipes' ) . '</span> ' .
                        '<span class="screen-reader-text">' . __( 'Previous post:', 'sussexchef_recipes' ) . '</span> ' .
                        '<span class="post-title">%title</span>',
                )
            );

            // End of the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>
