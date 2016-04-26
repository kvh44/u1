
   
   
    jQuery(document).ready(function(){  
        jQuery('#loginsubmit').click(function(){
         
          
          jQuery('#ajaxloader').show();
          jQuery('#loginstatezone').hide();
          jQuery.ajax({
          url: jQuery(this).parents('form').attr('action'),
          dataType: 'json',
          data: 'username='+ jQuery('#login_username').val()+"&password="+jQuery('#login_password').val() ,
          
          success: function(data){
          jQuery('#ajaxloader').hide();
          jQuery('#loginstatezone').show();
          if(data.state=="ok"){
            jQuery('#loginstatezone').html("登陆成功");
            jQuery('#login_password').css('border','1px solid #ADA9A5');
            jQuery('#login_username').css('border','1px solid #ADA9A5');
            jQuery(location).attr('href','/home');
          }
          else if(data.state=='error'){
           jQuery('#loginstatezone').html(data.loginerror);
           jQuery('#login_password').css('border','2px solid #C54343');
           jQuery('#login_username').css('border','2px solid #C54343');
          }

          }
          

          
        });
        
        });
        
jQuery('#logoutlink').click(function(){
jQuery(location).attr('href','/user/logout');
});

jQuery( "#newuserlink" ).click(function() {
jQuery(location).attr('href','/user/new');
}); 

jQuery("#search_button").click(function(){
jQuery(location).attr('href','/search?query='+jQuery("#search_text").val());    
});

      
    });  
    
    
    
    
    
    
 
    
    
    