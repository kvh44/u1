<br>
<a href="<?php echo url_for('category2/new') ?>" class="btn btn-success">创建新的二级目录</a>
<br><br>

<table class="table table-striped">
  <thead>
    <tr class="ui-widget-header">
      <th>一级目录</th>
      <th>二级目录名称</th>
      <th>管理</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($utoconsult_article_category2s as $utoconsult_article_category2): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      <td><?php echo $utoconsult_article_category2->getCategory1Id() ?></td>
      <td><?php echo $utoconsult_article_category2->getName() ?></td>
      <td><a href="<?php echo url_for('category2/edit?id='.$utoconsult_article_category2->getId()) ?>">编辑</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

