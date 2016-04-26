
<?php 
   if (isset($userinfo)) :
?>
<?php 
   if ($userinfo!=null) :
?>

<div id="profiltable">

<?php 
    if($userinfo->UtoconsultUser->UtoconsultUserProfilePhoto){
    	echo '<img src="/uploads/userprofilephotothumbnail/'.$userinfo->UtoconsultUser->UtoconsultUserProfilePhoto->photoicon.'" style="float:right;" />';
    }
?>

<h3>简介 - <?php echo $userinfo->UtoconsultUser->getUsername()?></h3>
<table width="100%">
  <?php if ($userinfo->realname):?>
  <tr>
    <td WIDTH="20%">发布者姓名:</td>
    <td><?php echo $userinfo->realname; ?></td>
  </tr>
  <?php endif;?>
  <?php if ($userinfo->web):?>
  <tr>
    <td WIDTH="20%">网址或微博:</td>
    <td><?php echo "<a href='".$userinfo->web."'>".$userinfo->web."</a>" ?></td>
  </tr>
  <?php endif;?>
  <?php if ($userinfo->special):?>
  <tr>
    <td WIDTH="20%">专业兴趣:</td>
    <td><?php echo $userinfo->special; ?></td>
  </tr>
  <?php endif;?>
  <?php if ($userinfo->description):?>
  <tr>
    <td WIDTH="20%">简短介绍:</td>
    <td><?php echo htmlspecialchars_decode($userinfo->description,ENT_QUOTES); ?></td>
  </tr>
  <?php endif;?>
  <?php if ($userinfo->province || $userinfo->city || $userinfo->area):?>
  <tr>
    <td WIDTH="20%">来自:</td>
    <td><?php echo $userinfo->province; ?> <?php echo $userinfo->city; ?> <?php echo $userinfo->area; ?></td>
  </tr>
  <?php endif;?>

  <tr>
    <td WIDTH="20%">最后更新:</td>
    <td><?php echo date('Y年m月d日',strtotime($userinfo->updated_at)); ?></td>
  </tr>

</table>
 <?php if (isset($user)) :?>
      <?php if ($user->getId()==$userinfo->getUser_id()) :?>
      
    <a style="float:right;"  href="<?php echo url_for('/userinfo/edit') ?>" class='button'>编辑个人信息</a>
    <a style="float:right;"  href="<?php echo url_for('/userprofilephoto/edit') ?>" class='button'>编辑照片</a>
      <?php endif;?>
    <?php endif;?>
</div>

    


<?php  endif; ?>
<?php  endif; ?>


 <?php if (isset($nouserinfo)) :?>
      <br />
      <br />
      <a href='/userinfo/new' class='button'>>>去完善我的个人信息</a>
 <?php endif;?>     
  
