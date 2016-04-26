<div class="lefttab">
    

<div class="list-group">


<?php 
  foreach ($categorys2 as $category){
    echo "<a class='list-group-item' href='/articles/index/category2/{$category['id']}/name/{$category['name']}.html'><h4 class='list-group-item-heading'>".$category['name']."</h4></a>";
  }			  
 ?>


</div>
</div>