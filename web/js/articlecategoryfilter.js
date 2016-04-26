/**
 * 
 */

$(document).ready(function(){ 

	$('#utoconsult_my_article_category1_id').change(function(){
		$("#article_category2_loader").html('<img src="/images/ajax-loader.gif" />');
		checkCategory1();
		$('#utoconsult_my_article_category2_id').attr('disabled',true);
		$('#utoconsult_my_article_category2_id').html('');
		$.ajax({
	          url: '/home/Getcategory2bycategory1',
	          dataType: 'json',
	          data: 'category1='+ $('#utoconsult_my_article_category1_id').val(),
	          cache: true,
	          success: function(data){
	        	  $('#utoconsult_my_article_category2_id').html('');
	        	  $('#utoconsult_my_article_category2_id').attr('disabled',false);
	        	  $('#utoconsult_my_article_category2_id').prepend('<option value="">分类2</option>');
	        	  $.each(data, function(key, val) {
	        		  $('#utoconsult_my_article_category2_id').append('<option value="' + val.id + '">' + val.name + '</option>');
	        	  });
	        	  $("#article_category2_loader").html('');
	          },
		     error: function(data){
		    	 $('#utoconsult_my_article_category2_id').html();
		 		 $('#utoconsult_my_article_category2_id').attr('disabled',true);
		     }


	          
	        });
	});
	
	checkCategory1();
	
});



function checkCategory1(){
	if($('#utoconsult_my_article_category1_id').val()==null || $('#utoconsult_my_article_category1_id').val()==0)
	{
		$('#utoconsult_my_article_category2_id').html();
		$('#utoconsult_my_article_category2_id').attr('disabled',true);
		
	}
}