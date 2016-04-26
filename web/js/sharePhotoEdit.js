/**
 * 
 */


jQuery(document).ready(function(){ 

    jQuery("#photo_advance_icon").click(function(){
		jQuery(".hiddenzone").toggle();
		return false;
	});
	
	jQuery("#photo_advance_icon").click(function(){
		jQuery("#avancer").toggleClass("expanded");
    });
});