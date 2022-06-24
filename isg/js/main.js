/**
 * main.js
 *
 * For all custom js codes.
 */
jQuery(document).ready(function($) {  
  
    
      $(window).click(function() {
        //Hide the menus if visible
        $('.btn-acc_option').removeClass('on');
        $('.sub-acc').removeClass('on');
      });
      $('.btn-acc_option').on('click', function() {
        event.stopPropagation();
        $(this).toggleClass('on');
        $('.sub-acc').toggleClass('on');
      });


});
