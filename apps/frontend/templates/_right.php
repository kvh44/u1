<div class="right" <?php if(isset($user)){echo "style='width:160px;'";} ?>>
<div class="right_login">
				
			
<?php include_partial('global/login',array('user'=>isset($user)?$user:null,'company'=>isset($company)?$company:null,'loginform'=>$loginform))?>
				
			
				
</div>
			<div class="right_articles">
				<p><img src="/images/image.gif" alt="Image" title="Image" class="image" /><b>应用推广</b></p>
			</div>

</div>