<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<section id="ppprimary" class="wrap cccontent-area">
		<main id="main" class="site-main">

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="recipe-archive__title page-title">', '</h1>' );
                ?>
            </header><!-- .page-header -->

            <section class="">
                <div class="">
                    <div class="row py-5">
                        <div class="col-12 row justify-content-center pt-4">
                            <?php include('template-parts/partials/archive-categories.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="recipe-archive__filters">
                    <?php
                    $obj_id = get_queried_object_id();
                    //$current_url = get_term_link( $obj_id );
                    $current_url    = get_post_type_archive_link('recipes');
                    $obj = get_queried_object();
                    $category_post = $obj->name;
                    ?>
                    <form id="archive-filters" method="POST" class="w-100" action="<?php echo $current_url; ?>">
                        <div class="row no-gutters justify-content-center">
                            <div class="col-12 col-lg-2">
                                Tastes <br />
                                <select name="recipesTastes">
                                    <?php
                                    $recipe_tastes_terms = get_terms('recipes-tax-tastes');
                                    $recipe_tastes_term_ids = wp_list_pluck( $recipe_tastes_terms, 'slug' );

                                    if(!empty($_POST['recipesTastes'])):
                                        if(esc_html($_POST['recipesTastes'] == $recipe_tastes_term_ids)):
                                            $recipe_tastes_category_post = $recipe_tastes_term_ids;
                                        else:
                                            $recipe_tastes_category_post = esc_html($_POST['recipesTastes']);
                                        endif;
                                    else:
                                        $recipe_tastes_category_post = $recipe_tastes_term_ids;
                                    endif;

                                    if($recipe_tastes_category_post == $recipe_tastes_term_ids):
                                        echo '<option value="">Alle</option>';
                                    else:
                                        echo '<option value="">Alle</option>';
                                        echo '<option value="'. $recipe_tastes_category_post .'">'. $recipe_tastes_category_post .'</option>';
                                    endif;


                                    foreach($recipe_tastes_terms as $recipe_tastes_term):
                                        if($recipe_tastes_term->slug == $recipe_tastes_category_post):
                                            echo '<option value="'.$recipe_tastes_term->slug.'" selected style="display:none;">'.$recipe_tastes_term->name.'</option>';
                                        else:
                                            echo '<option value="'.$recipe_tastes_term->slug.'">'.$recipe_tastes_term->name.'</option>';
                                        endif;
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-2">
                                Cuisines <br />
                                <select name="recipesCuisines">
                                    <?php
                                    $recipe_cuisines_terms = get_terms('recipes-tax-cuisines');
                                    $recipe_cuisines_term_ids = wp_list_pluck( $recipe_cuisines_terms, 'slug' );

                                    if(!empty($_POST['recipesCuisines'])):
                                        if(esc_html($_POST['recipesCuisines'] == $recipe_cuisines_term_ids)):
                                            $recipe_cuisines_category_post = $recipe_cuisines_term_ids;
                                        else:
                                            $recipe_cuisines_category_post = esc_html($_POST['recipesCuisines']);
                                        endif;
                                    else:
                                        $recipe_cuisines_category_post = $recipe_cuisines_term_ids;
                                    endif;

                                    if($recipe_cuisines_category_post == $recipe_cuisines_term_ids):
                                        echo '<option value="">Alle</option>';
                                    else:
                                        echo '<option value="">Alle</option>';
                                        echo '<option value="'. $recipe_cuisines_category_post .'">'. $recipe_cuisines_category_post .'</option>';
                                    endif;


                                    foreach($recipe_cuisines_terms as $recipe_cuisines_term):
                                        if($recipe_cuisines_term->slug == $recipe_cuisines_category_post):
                                            echo '<option value="'.$recipe_cuisines_term->slug.'" selected style="display:none;">'.$recipe_cuisines_term->name.'</option>';
                                        else:
                                            echo '<option value="'.$recipe_cuisines_term->slug.'">'.$recipe_cuisines_term->name.'</option>';
                                        endif;
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-2">
                                Cuisines <br />
                                <select name="recipesCountries">
                                    <?php
                                    $recipe_countries_terms = get_terms('recipes-tax-countries');
                                    $recipe_countries_term_ids = wp_list_pluck( $recipe_countries_terms, 'slug' );

                                    if(!empty($_POST['recipesCountries'])):
                                        if(esc_html($_POST['recipesCountries'] == $recipe_countries_term_ids)):
                                            $recipe_countries_category_post = $recipe_countries_term_ids;
                                        else:
                                            $recipe_countries_category_post = esc_html($_POST['recipesCountries']);
                                        endif;
                                    else:
                                        $recipe_countries_category_post = $recipe_countries_term_ids;
                                    endif;

                                    if($recipe_countries_category_post == $recipe_countries_term_ids):
                                        echo '<option value="">Alle</option>';
                                    else:
                                        echo '<option value="">Alle</option>';
                                        echo '<option value="'. $recipe_countries_category_post .'">'. $recipe_countries_category_post .'</option>';
                                    endif;


                                    foreach($recipe_countries_terms as $recipe_countries_term):
                                        if($recipe_countries_term->slug == $recipe_countries_category_post):
                                            echo '<option value="'.$recipe_countries_term->slug.'" selected style="display:none;">'.$recipe_countries_term->name.'</option>';
                                        else:
                                            echo '<option value="'.$recipe_countries_term->slug.'">'.$recipe_countries_term->name.'</option>';
                                        endif;
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-lg-4">
                                <br />
                                <?php
                                if(!empty($_POST['search'])):
                                    $search_querry = esc_html($_POST['search']);
                                    echo '<input type="search" name="search" value="'. $search_querry .'">';
                                else:
                                    $search_querry = '';
                                    echo '<input type="search" name="search" placeholder="Hier zoeken …">';
                                endif;
                                ?>
                            </div>
                            <div class="col-12 col-lg-2">
                                <br />
                                <input type="hidden" name="submitted" value="Y">
                                <button type="submit" value="Zoeken" class="btn btn-large btn-secondary-lime large-text color--white float-right mt-0 search-submit">Zoeken</button>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
                        (function($) {
                            // change
                            $('#archive-filters').on("change", function(){
                                $('#archive-filters').submit();
                            });
                        })(jQuery);
                    </script>
                </div>
                <div class="">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-12 col-xl-10 card-columns">
                            <?php
                            //Avoid caching on customized searches
                            if(!empty($_POST['search'])):
                                $cache_querry = false;
                            else:
                                $cache_querry = true;
                            endif;

                            // Define our WP Query Parameters
                            $args = array(
                                "post_type"      => "recipes",
                                "posts_per_page" => -1,
                                'cache_results'  => $cache_querry,
                                'no_found_rows'  => true,
                                "nopaging"       => true,
                                "post_status"    => "publish",
                                "fields"         => "ids",
                                's'              => $search_querry,
                                "tax_query" 	 => array (
                                    'relation' => 'AND',
                                    array (
                                        "taxonomy" 	=> "recipes-tax-tastes",
                                        "field"		=> "slug",
                                        "terms"		=> $recipe_tastes_category_post,
                                    ),
                                    array (
                                        "taxonomy" 	=> "recipes-tax-cuisines",
                                        "field"		=> "slug",
                                        "terms"		=> $recipe_cuisines_category_post,
                                    ),
                                    array (
                                        "taxonomy" 	=> "recipes-tax-countries",
                                        "field"		=> "slug",
                                        "terms"		=> $recipe_countries_category_post,
                                    ),
                                ),
                            );

                            $the_query = new WP_Query( $args );

                            // Start our WP Query
                            if($the_query->have_posts()):

                                echo '<div class="row">';

                                while ($the_query -> have_posts()) : $the_query -> the_post();

                                    include('template-parts/content-archive.php');

                                endwhile;
                                wp_reset_postdata();

                                echo '</div>';
                            else :

                                // If no content, include the "No posts found" template.
                                include('template-parts/content-archive-notfound.php');

                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
