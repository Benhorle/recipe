jQuery( document ).ready(function($) {
    $(function() {

        $('.servingQtyIn').on("input", function(){

            var targetVar   = $(this).data("target");
            var servings = $(targetVar + ' .servingQtyIn').val();

            $(targetVar + ' .servingNo').text(servings);

            $(targetVar + ' tr.servingCalcThis').each(function(){
                var PricePerServing = +( $(this).find(".servingPPS").text() );
                var QtyPerServing   = parseInt( $(this).find(".servingQPS").text() );

                //console.log('Price per serv: ' + PricePerServing);
                //console.log('Qty per serv: ' + QtyPerServing);

                var ExactPrice       = servings * PricePerServing;
                var ExactQuantity    = servings * QtyPerServing;

                //Round variables
                var price       = ExactPrice.toFixed(2);
                //var quantity    = ExactQuantity.toFixed(1);
                var quantity    = ExactQuantity;

                //console.log('Price: ' + price);
                //console.log('Qty: ' + quantity);

                $(this).find('.servingPrice').text(price);
                $(this).find('.servingQty').text(quantity);

            });

            var sum = 0;
            $(targetVar + " .servingPrice").each(function() {
                var val = $.trim( $(this).text() );

                if ( val ) {
                    val = parseFloat( val.replace( /^\$/, "" ) );
                    sum += !isNaN( val ) ? val : 0;
                }
            });

            var TotalPrice       = sum.toFixed(2);
            $('.servingTotalPrice').text(TotalPrice);

        });

        $(document).ready(function() {
            $(".servingQtyIn").each(function() {

                var targetVar   = $(this).data("target");
                var sum = 0;

                $(targetVar + " .servingPrice").each(function() {
                    var val = $.trim( $(this).text() );

                    if ( val ) {
                        val = parseFloat( val.replace( /^\$/, "" ) );
                        sum += !isNaN( val ) ? val : 0;
                    }
                });

                var TotalPrice       = sum.toFixed(2);
                $('.servingTotalPrice').text(TotalPrice);

            });
        });

    });
});