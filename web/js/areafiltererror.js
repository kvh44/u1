/**
 * 
 */

$(document).ready(function(){ 
	check2();
});

function check2(){
	provinceID=$('#utoconsult_user_information_province').val(); 
	cityID=$('#utoconsult_user_information_city').val();
	areaID=$('#utoconsult_user_information_area').val();
	if(provinceID!=null || provinceID!=0)
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
      		  if(val.cityID==cityID)
      		  {
      			$('#utoconsult_user_information_city').append('<option value="' + val.cityID + '" selected="selected">' + val.city + '</option>');
      		  } 
      		  else{
      		    $('#utoconsult_user_information_city').append('<option value="' + val.cityID + '">' + val.city + '</option>');
      		  }
      		});

        }


        
      });
	
	
	
	
	if(cityID!=null || cityID!=0)
	$.ajax({
        url: '/home/Getareabycityid/',
        dataType: 'json',
        data: 'id='+ $('#utoconsult_user_information_city').val(),
        success: function(data){
      	  $('#utoconsult_user_information_area').html('');
      	  $('#utoconsult_user_information_area').attr('disabled',false);
      	  $('#utoconsult_user_information_area').prepend('<option value="0">地区</option>');
      	  $.each(data, function(key, val) {
      		  if(val.areaID==areaID){
      		    $('#utoconsult_user_information_area').append('<option value="' + val.areaID + '" selected="selected">' + val.area + '</option>');
      		  }
      		  else{
      			$('#utoconsult_user_information_area').append('<option value="' + val.areaID + '" >' + val.area + '</option>');  
      		  }
      	  });

        }
        

        
      });
	
	
	
}
