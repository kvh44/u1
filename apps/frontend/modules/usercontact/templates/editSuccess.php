<script>
  $(document).ready(function() {
    $("#usertabs").tabs();
  });
</script>


<br><br><br>


<div id="usertabs">
    <ul>
        <li><a href="#fragment-1"><span>修改个人联络方式</span></a></li>      
    </ul>
    <div id="fragment-1">
    
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php endif; ?>
    
<div id="profiltable">

<h3>修改个人联络方式：</h3>


<?php include_partial('form', array('form' => $form)) ?>
</div>
</div>

</div>
 

