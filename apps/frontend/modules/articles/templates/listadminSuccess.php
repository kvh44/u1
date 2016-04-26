<?php slot('title') ?>
  <?php 
  $title=" 优拓  ";
  if (isset($utoconsult_articles[0]))
  $title.=$utoconsult_articles[0]['UtoconsultArticleCategory1']['name']; 
  
  if (isset($utoconsult_articles[0]))
  $title.=$utoconsult_articles[0]['UtoconsultArticleCategory2']['name'];
  
  echo $title;
  
  $description=$title;
  
  $keywords=$title;
  
  $robots=$title;
  
  
  
  ?>
<?php end_slot(); ?>
<?php slot('description') ?>
  <?php echo $description; ?>
<?php end_slot(); ?>  
<?php slot('keywords') ?>
  <?php echo $keywords; ?>
<?php end_slot(); ?>  
<?php slot('robots') ?>
  <?php echo $robots; ?>
<?php end_slot(); ?>  


<br>

<a href="/articles/new" class="btn btn-success">创建新文章</a>
<br>
<br>
<?php 
      $utoconsult_articles=$pager->getResults();
      $category2='';
      if (isset($category2_request)){
      	$category2='category2/'.$utoconsult_articles[0]['category2_id'].'/';
      }
      
?>




<?php include_partial('listadmin', array('utoconsult_articles' => $pager->getResults(),'categorys'=> isset($categorys)?$categorys:null)) ?>



<?php if ($pager->haveToPaginate()): ?>
<div>    
  <ul class="pagination">
    <li class=""><a href="/articles/listadmin/page/1">
      第一页
    </a></li>
 
    <li class=""><a href="/articles/listadmin/page/<?php echo $pager->getPreviousPage() ?>">
      上一页
    </a></li>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <li class="active"><a href="/articles/listadmin/page/<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php else: ?>
        <li class=""><a href="/articles/listadmin/page/<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <li class=""><a href="/articles/listadmin/page/<?php echo $pager->getNextPage() ?>">
      下一页
    </a></li>
 
    <li class=""><a href="/articles/listadmin/page/<?php echo $pager->getLastPage() ?>">
      最后一页
    </a></li>  
  </ul>
</div>    
<?php endif; ?>
 








  