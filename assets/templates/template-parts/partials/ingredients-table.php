<?php
/**
 *  This file adds the template for the ingredients table
 */

$recipe  = get_field('recipe_info');

$recipe_servings        = '';
$recipe_servings_min    = '';
$recipe_servings_incr   = '';

$recipe_ingredients     = '';

if( $recipe ):

    $recipe_servings        = $recipe['servings_info']; //Group
    if($recipe_servings):

        $recipe_servings_min    = $recipe_servings['minimum_servings'];
        $recipe_servings_incr   = $recipe_servings['servings_increment'];

    endif;

    $recipe_ingredients     = $recipe['ingredients']; //Repeater

endif;

?>

<?php if($recipe_ingredients):

    if( is_archive() ):
        $archive_single_table_class = 'd-none';
        $archive_single_form_input  = 'class="col-md-6"';
        $archive_single_form_button = 'class="col-md-6"';

    else:
        $archive_single_table_class = 'd-none';
        $archive_single_form_input  = 'class="col-md-2"';
        $archive_single_form_button = 'class="col-md-3"';
    endif;
    ?>

    <div class="servingForm calcForm-<?php the_ID(); ?>">

        <div class="row">
            <div <?php echo $archive_single_form_input; ?>>
                <input class="servingQtyIn" type="number" name="points" data-target=".calcForm-<?php the_ID(); ?>" min="<?php echo $recipe_servings_min; ?>" step="<?php echo $recipe_servings_incr; ?>" value="<?php echo $recipe_servings_min; ?>">
            </div>
            <?php
            /**
            <div <?php echo $archive_single_form_input; ?>>
                <input class="servingSubmit" type="submit" value="Caclulate" data-target=".calcForm-<?php the_ID(); ?>">
            </div>
             */
            ?>
        </div>
    </div>


    <?php if(is_single()): ?>
    <div>
        Total price: £<span class="servingTotalPrice"></span>
        <button class="right recipe__ingredients-toggleprice ingredientTogglePrice">
            £
        </button>
    </div>

    <script type="text/javascript">
        (function($) {
            // change
            $('.ingredientTogglePrice').click(function(){
                $('.ingredientPrice').toggleClass('d-none');
            });
        })(jQuery);
    </script>
    <?php endif; ?>

    <table class="servingCalcs calcForm-<?php the_ID(); ?>">

        <tr>
            <th>
                Image
            </th>
            <th>
                Ingredient
            </th>
            <th class="<?php echo $archive_single_table_class; ?>">
                # / serving
            </th>
            <th>
                # for  <span class="servingNo"><?php echo $recipe_servings_min; ?></span> servings
            </th>
            <th class="<?php echo $archive_single_table_class; ?> ingredientPrice">
                £ / serving
            </th>
            <th class="<?php echo $archive_single_table_class; ?> ingredientPrice">
                £ for <span class="servingNo"><?php echo $recipe_servings_min; ?></span> servings
            </th>
        </tr>

        <?php foreach( $recipe_ingredients as $ingredients) {

            if($ingredients['category']):

                $recipe_ingredients_category    = $ingredients['category'];
                echo '<tr><td>'. $recipe_ingredients_category .'</td></tr>';

            endif;

            if($ingredients['ingredients']):

                $recipe_ingredients_ingredient  = $ingredients['ingredients'];
                foreach ($recipe_ingredients_ingredient as $ingredient) {

                    $amount = $ingredient['amount'];
                    $ingredient = $ingredient['ingredient'];

                    $id = $ingredient[0]->ID;
                    $title = $ingredient[0]->post_title;
                    $excerpt = $ingredient[0]->post_excerpt;
                    $content = $ingredient[0]->post_content;

                    $image = get_the_post_thumbnail($id, 'ingredient-thumb');

                    $price = get_field('price_per_qty', $id);
                    $qty_amount = get_field('quantity_amount', $id);
                    $qty_type = get_field('quantity_type', $id);

                    $price = $price / $qty_amount;

                    ?>
                    <tr class="servingCalcThis">
                        <td>
                            <?php echo $image; ?>
                        </td>
                        <td>
                            <?php echo $title; ?>
                        </td>
                        <td class="<?php echo $archive_single_table_class; ?>">
                            <?php //Qty per serving
                            $qty_per_serving = $amount / $recipe_servings_min; ?>
                            <span class="servingQPS"><?php echo $qty_per_serving; ?></span> <?php echo $qty_type; ?>
                        </td>
                        <td>
                            <span class="servingQty"><?php echo $amount; ?></span> <?php echo $qty_type; ?>
                        </td>
                        <td class="<?php echo $archive_single_table_class; ?> ingredientPrice">
                            <?php //Price per serving
                            //Value is used for the calculations, so NEVER round this number!
                            $price_per_serving = $price / $recipe_servings_min;
                            ?>
                            £ <span class="servingPPS"><?php echo $price_per_serving; ?></span>
                        </td>
                        <td class="<?php echo $archive_single_table_class; ?> ingredientPrice">
                            £ <span class="servingPrice"><?php echo number_format($price, 2); ?></span>
                        </td>
                    </tr>
                    <?php
                }
            endif;
        }?>

    </table>
<?php endif; ?>