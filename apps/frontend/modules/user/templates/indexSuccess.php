<?php 

if (isset($request_id)): 
?>

<input type="hidden" id="user_id" value="<?php echo $request_id?>" />


<div class="left">

  
   <br> 
   <div id="usertabs" >
      <ul class="nav nav-tabs">
        <li><a href="#fragment-1"><span>发布者信息</span></a></li>
        <li><a href="#fragment-2"><span>联络方式</span></a></li>
      </ul>
       <div class="tab-content">
        <div id="fragment-1" class="tab-pane active"></div>
        <div id="fragment-2" class="tab-pane"></div>
       </div>
    
    </div>
    
  

</div>
<?php endif;?> 
