
<br>
<a href="<?php echo url_for('category1/new') ?>" class="btn btn-success">创建新的一级目录</a>
<br><br>

<table class="table table-striped">
  <thead>
    <tr class="ui-widget-header">
      <th>一级目录名称</th>
      <th>关键词</th>
      <th>首页小图</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utoconsult_article_category1s as $utoconsult_article_category1): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td><?php echo $utoconsult_article_category1->getName() ?></td>
      <td><?php echo $utoconsult_article_category1->getKeywords() ?></td>
      <td>
      <?php if($utoconsult_article_category1->getPhoto1()!=""): ?>
        <img src="/uploads/category1photo1/<?php echo $utoconsult_article_category1->getPhoto1() ?>" class="small-photo-1" />
      <?php endif; ?>
      </td>
      <td><a href="<?php echo url_for('category1/edit?id='.$utoconsult_article_category1->getId()) ?>">编辑</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


