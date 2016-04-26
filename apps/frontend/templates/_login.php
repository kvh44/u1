
<?php 
if ($sf_user->getAttribute('user')==null ) {
?>
<div>
<button id="loginlink" style="margin:5px;width:100%;height:60px;z-index:0;position: relative;">用户登陆</button>
<button id="newuserlink" style="margin:5px;width:100%;z-index:0;position: relative;">个人注册</button>
<!--button id="newcompanylink" style="margin:5px;width:100%;z-index:0;position: relative;">企业加盟</button-->
</div>

<?php }
else if ($sf_user->getAttribute('user')!=null){

	if ($sf_user->getAttribute('userprofilephoto')) {
	     	$userprofilephoto= '/uploads/userprofilephotothumbnail/'.$sf_user->getAttribute('userprofilephoto')->getPhotoicon();
	}
	else {
		    $userprofilephoto='/uploads/assets/user32.png';     
	}
	
	
	echo '<div class="userprofilebar"><div><a href="/user/index/tab/2"><img src="'.$userprofilephoto.'" style="max-width:50px;margin-top: 6px;" /></a></div>';
	echo '<table><tr><td>'.link_to($sf_user->getAttribute('user')->getUsername(), "/user/{$sf_user->getAttribute('user')->getUsername()}.html",array('class'=>'importantlink')).
	'</td></tr>';
	
	if ($sf_user->getAttribute('user')->getIsadmin()){
		echo '<tr><td>';
		echo '<a href = "/articles/listadmin">文章管理 </a>';

		echo '<a href = "/photo/listadmin">分享图片 </a>';

		echo '<a href = "/backend.php/user">后台 </a>';
		echo '</td></tr>';
	}
	
    echo '</table>
	<button id="logoutlink" style="margin-top:5px;width:100%;z-index:0;position: relative;">退出</button>'.
    '</div>';
	
   
	
	
}
?>


