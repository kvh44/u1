/**
 * 
 */

jQuery(document).ready(function(){  
   check_block_height();
});


function check_block_height(){
    
    $('tr').each(function(index, obj) {
        max_height = 360;
        $(this).find('.panel').each(function(index, obj) {
            max_height = ($(this).height() > max_height) ? $(this).height() : max_height ;
            //console.log(max_height);
        });
        $(this).find('.panel').height(max_height+"px");
    });
    /*
    $('.panel').each(function( index, obj ) {
        max_height = ($(this).height() > max_height) ? $(this).height() : max_height ;
        console.log(max_height);
    });
    
    $('.panel').height(max_height+"px");
    */
}
