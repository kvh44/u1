/**
 * 
 */

$(document).ready(function(){ 
	checkCategory2();
});


function checkCategory2(){
	category1=$('#utoconsult_my_article_category1_id').val(); 
	category2=$('#utoconsult_my_article_category2_id').val(); 
	if(category1!=null || category1!=0)
	$.ajax({
        url: '/home/Getcategory2bycategory1/',
        dataType: 'json',
        data: 'category1='+ category1,
        success: function(data){
      	  $('#utoconsult_my_article_category2_id').html('');
      	  $('#utoconsult_my_article_category2_id').attr('disabled',false);
      	  $('#utoconsult_my_article_category2_id').prepend('<option value="0">分类2</option>');
      	  $.each(data, function(key, val) {
      		  if(val.id==category2)
      		  {
      			$('#utoconsult_my_article_category2_id').append('<option value="' + val.id + '" selected="selected">' + val.name + '</option>');
      		  } 
      		  else{
      		    $('#utoconsult_my_article_category2_id').append('<option value="' + val.id + '">' + val.name + '</option>');
      		  }
      		});

        }


        
      });
}