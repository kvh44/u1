<div>
  <h3>关于<?php echo $sf_request->getParameter('query'); ?> 找到<?php echo $total ?>个结果</h3>
  <?php if ( $total > 0 ): ?>
  <table border='0' class="table table-striped table-hover">
  <thead>
    <tr class="ui-widget-header">
      <th>文章标题</th>
    </tr>
  </thead>
  <tbody>
  <?php include_partial('search/list', array('articles' => $articles,'query' => $query)) ?>
  </tbody>    
 </table>
 <?php endif; ?> 
</div>