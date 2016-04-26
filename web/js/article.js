/**
 * 
 */


jQuery(document).ready(function(){  
	other_article_list();
	publisher_information();
});




function other_article_list(){
	jQuery('#other_article_list').html('<img src="/images/25-0.gif" />');
	jQuery.ajax({
        url: '/articles/listotherarticle',
        data: 'article_id='+jQuery('#article_id').val(),
        
        success: function(data){
        	jQuery('#other_article_list').html(data);
        }
	});
}


function publisher_information(){
	jQuery('#publisher_information').html('<img src="/images/25-0.gif" />');
	jQuery.ajax({
        url: '/userinfo/index',
        data: 'id='+jQuery('#user_id').val(),
        
        success: function(data){
        	jQuery('#publisher_information').html(data);
        }
	});
}

function send_mail(){
	jQuery('#email_suggestion_result').html('<img src="/images/25-0.gif" />');
	jQuery.ajax({
        url: '/articles/email',
        data: 'email='+jQuery('#email_suggestion').val()+'&article_id='+jQuery('#article_id').val(),
        
        success: function(data){
        	jQuery('#email_suggestion_result').html(jQuery('#email_suggestion').val()+'已经发送成功');
        	
        }
	});
}