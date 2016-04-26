/**
 * 
 */

$(document).ready(function(){ 

	$('#utoconsult_user_information_province').change(function(){
		check1();
		$('#utoconsult_user_information_area').attr('disabled',true);
		$('#utoconsult_user_information_area').html('');
		$.ajax({
	          url: '/home/Getcitybyprovinceid/',
	          dataType: 'json',
	          data: 'id='+ $('#utoconsult_user_information_province').val(),
	          cache: true,
	          success: function(data){
	        	  $('#utoconsult_user_information_city').html('');
	        	  $('#utoconsult_user_information_city').attr('disabled',false);
	        	  $('#utoconsult_user_information_city').prepend('<option value="0">市</option>');
	        	  $.each(data, function(key, val) {
	        		  $('#utoconsult_user_information_city').append('<option value="' + val.cityID + '">' + val.city + '</option>');
	        	  });

	          },
		     error: function(data){
		    	 $('#utoconsult_user_information_city').html();
		 		 $('#utoconsult_user_information_area').html();
		 		 $('#utoconsult_user_information_city').attr('disabled',true);
		 		 $('#utoconsult_user_information_area').attr('disabled',true);
		     }


	          
	        });
	});




	$('#utoconsult_user_information_city').change(function(){
		check1();
		$.ajax({
	          url: '/home/Getareabycityid/',
	          dataType: 'json',
	          data: 'id='+ $('#utoconsult_user_information_city').val(),
	          success: function(data){
	        	  $('#utoconsult_user_information_area').html('');
	        	  $('#utoconsult_user_information_area').attr('disabled',false);
	        	  $('#utoconsult_user_information_area').prepend('<option value="0">地区</option>');
	        	  $.each(data, function(key, val) {
	        		  $('#utoconsult_user_information_area').append('<option value="' + val.areaID + '">' + val.area + '</option>');
	        	  });

	          },
		      error: function(data){
		    	  $('#utoconsult_user_information_area').html();
		  		  $('#utoconsult_user_information_area').attr('disabled',true);
	          }  

	          
	        });
	});
	
	
	
	check1();
	
});



function check1(){
	if($('#utoconsult_user_information_city').val()==null || $('#utoconsult_user_information_city').val()==0)
	{
		$('#utoconsult_user_information_area').html();
		$('#utoconsult_user_information_area').attr('disabled',true);
		
	}
	
	if($('#utoconsult_user_information_province').val()==null || $('#utoconsult_user_information_province').val()==0)
	{
		$('#utoconsult_user_information_city').html();
		$('#utoconsult_user_information_area').html();
		$('#utoconsult_user_information_city').attr('disabled',true);
		$('#utoconsult_user_information_area').attr('disabled',true);
		
	}   
}