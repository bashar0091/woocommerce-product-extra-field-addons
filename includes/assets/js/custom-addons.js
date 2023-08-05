jQuery(document).ready(function($) {

    $('.entry-summary .mkdf-single-product-title').remove();
    $('.entry-summary .price').remove();
    $('.woocommerce-product-details__short-description').remove();


    // dropdown click open 
    $('.dropdown_click').click(function() {
        var parentDropdown = $(this).closest('.wc_pefa_option_1_dropdown');
        $('.wc_pefa_option_1_dropdown').not(parentDropdown).removeClass('active');
        parentDropdown.toggleClass('active');
    });
    $(document).click(function(event) {
        if (!$(event.target).closest('.wc_pefa_option_1_dropdown').length) {
            $('.wc_pefa_option_1_dropdown').removeClass('active');
        }
    });
    $('.wc_pefa_option_1_dropdown').click(function(event) {
        event.stopPropagation();
    })
    // label click close dropdown 
    $('.wc_pefa_option_1_dropdown_list_click label').click(function() {
        var list_text = $(this).text();
        $(this).parent().parent().parent().find('.wc_pefa_option_1_dropdown_title span').text(list_text);
        $('.wc_pefa_option_1_dropdown').removeClass('active');
    });
    

    // option click 
    $('.option_wrapper_click').click(function() {
        $(this).toggleClass('active');
    });
});