<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>


<?php 
   if (isset($usercontact)) :
?>
<?php 
   if ($usercontact!=null) :
?>

<div id="profiltable">

<h3>联络方式- <?php echo $usercontact['UtoconsultUser']['_data']['username'] ?></h3>
<table width="100%">
  <tr>
    <td WIDTH="20%"><b>Email:</b></td>
    <td><?php echo $usercontact['UtoconsultUser']['_data']['email']; ?></td>
  </tr>
  <tr>
    <td WIDTH="20%"><b>Skype:</b></td>
    <td><?php echo $usercontact->skype; ?>
    </td>
  </tr>
  <tr>
    <td WIDTH="20%"><b>QQ:</b></td>
    <td>
    <?php echo $usercontact->qq ?>
    </td>
  </tr>
  <tr>
    <td WIDTH="20%"><b>MSN:</b></td>
    <td><?php echo $usercontact->msn; ?></td>
  </tr>
  <tr>
    <td WIDTH="20%"><b>电话:</b></td>
    <td><?php echo $usercontact->fix ?></td>
  </tr>
  <tr>
    <td WIDTH="20%"><b>手机:</b></td>
    <td><?php echo $usercontact->mobile; ?></td>
  </tr>
  
  
  
  
  
  <tr>
    <td WIDTH="20%"><b>最后更新:</b></td>
    <td><?php echo date('Y年m月d日',strtotime($usercontact->updated_at));  ?></td>
  </tr>

</table>
 <?php if (isset($user)) :?>
      <?php if ($user->getId()==$usercontact->getUser_id()) :?>
    <a style="float:right;"  href="<?php echo url_for('/usercontact/edit') ?>" class='button'>编辑</a>
      <?php endif;?>
    <?php endif;?>
</div>

    


<?php  endif; ?>
<?php  endif; ?>


 <?php if (isset($nousercontact)) :?>
      <br />
      <br />
      <a href='/usercontact/new' class='button'>>>去完善我的联系方式</a>   
 <?php endif;?>     






