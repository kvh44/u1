<script>
  $(document).ready(function() {
    $("#usertabs").tabs();
  });
</script>

<br><br><br>


<div id="usertabs">
    <ul>
        <li><a href="#fragment-1"><span>创建个人联络方式</span></a></li>      
    </ul>
    <div id="fragment-1">
<div id="profiltable">


<h3>创建个人联络方式：</h3>

<?php include_partial('form', array('form' => $form)) ?>


</div>
</div>
 
 
</div>
