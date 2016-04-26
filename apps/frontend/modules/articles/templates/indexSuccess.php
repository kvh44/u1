
<?php slot('title') ?>
  <?php 
  $title=" 优拓  ";
  if (isset($categorys[0]))
  $title.=$categorys[0]['name'];
  
  
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


<div class="left">




<?php 
      $utoconsult_articles=$pager->getResults();
      
      $category='';
      if (isset($category2_request)){
      	$category='category2/'.$utoconsult_articles[0]['category2_id'].'/';
      }
      
      
      if (isset($category_request)){
      	$category='category/'.$utoconsult_articles[0]['UtoconsultArticleCategory1']['id'].'/';
      }
      
?>


<?php include_partial('list', array('utoconsult_articles' => $pager->getResults(),'categorys'=> isset($categorys)?$categorys:null)) ?>


<?php if ($pager->haveToPaginate()): ?>
<div>    
  <ul class="pagination">
    <li class=""><a href="/articles/index/<?php echo $category ?>page/1">
      第一页
    </a></li>
 
    <li class=""><a href="/articles/index/<?php echo $category ?>page/<?php echo $pager->getPreviousPage() ?>">
      上一页
    </a></li>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <li class="active"><a href="/articles/index/<?php echo $category ?>page/<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php else: ?>
        <li class=""><a href="/articles/index/<?php echo $category ?>page/<?php echo $page ?>"><?php echo $page ?></a></li>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <li class=""><a href="/articles/index/<?php echo $category ?>page/<?php echo $pager->getNextPage() ?>">
      下一页
    </a></li>
 
    <li class=""><a href="/articles/index/<?php echo $category ?>page/<?php echo $pager->getLastPage() ?>">
      最后一页
    </a></li>  
  </ul>
</div>    
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> 篇此类文章
</div>







</div>  




  