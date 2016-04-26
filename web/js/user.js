/**
 * 
 */

jQuery(document).ready(function(){  
    get_user_information();
    get_user_contact();
});

function get_user_information(){
	jQuery('#fragment-1').html('<img src="/images/25-0.gif" />');
	jQuery.ajax({
        url: '/userinfo/index',
        data: 'id='+jQuery('#user_id').val(),
        
        success: function(data){
        	jQuery('#fragment-1').html(data);
        }
	});
}


function get_user_contact(){
	jQuery('#fragment-2').html('<img src="/images/25-0.gif" />');
	jQuery.ajax({
        url: '/usercontact/index',
        data: 'id='+jQuery('#user_id').val(),
        
        success: function(data){
        	jQuery('#fragment-2').html(data);
        }
	});
}