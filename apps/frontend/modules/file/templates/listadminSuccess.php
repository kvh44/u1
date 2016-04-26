<?php slot('title') ?>
  <?php 
  $title=" 优拓  ";

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

<a href="/file/new" class="btn btn-success">创建新文档</a>
<br>
<br>
<?php 
      $utoconsult_files=$pager->getResults(); 
?>



<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> 个文档
 
  <?php if ($pager->haveToPaginate()): ?>
    - 页 <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>



<?php include_partial('listadmin', array('utoconsult_files' => $pager->getResults())); ?>


<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="/file/listadmin/page/1">
      <img src="/sfDoctrinePlugin/images/first.png" alt="第一页" title="第一页" />
    </a>
 
    <a href="/file/listadmin/page/<?php echo $pager->getPreviousPage() ?>">
      <img src="/sfDoctrinePlugin/images/previous.png" alt="上一页" title="上一页" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="/file/listadmin/page/<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="/file/listadmin/page/<?php echo $pager->getNextPage() ?>">
      <img src="/sfDoctrinePlugin/images/next.png" alt="下一页" title="下一页" />
    </a>
 
    <a href="/file/listadmin/page/<?php echo $pager->getLastPage() ?>">
      <img src="/sfDoctrinePlugin/images/last.png" alt="最后一页" title="最后一页" />
    </a>
  </div>
<?php endif; ?>
 






  