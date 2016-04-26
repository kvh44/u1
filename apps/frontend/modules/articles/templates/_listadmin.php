<?php if (count($utoconsult_articles)>0): ?>
<table border='0' class="table table-striped table-hover">
<thead>
    <tr class="ui-widget-header">
      <th>标题</th>
      <th>作者</th>
      <th>更新于</th>
      <th>管理</th>
    </tr>
</thead>
    <?php foreach ($utoconsult_articles as $i=>$utoconsult_article): ?>
   
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

      <td><a href="/articles/single/id/<?php echo $utoconsult_article['id']  ?>.html"><?php echo $utoconsult_article['title'] ?></a></td>
      <td><a href="/user/<?php echo $utoconsult_article['UtoconsultUser']['username'] ?>.html"><?php echo ($utoconsult_article['UtoconsultUser']['UtoconsultUserInformation']['realname'])?$utoconsult_article['UtoconsultUser']['UtoconsultUserInformation']['realname']:$utoconsult_article['UtoconsultUser']['username'] ?></a></td>
      <td><?php echo date('Y年m月d日',strtotime($utoconsult_article['updated_at']));
       ?></td>
       <td>
       <a href="/articles/edit?id=<?php echo $utoconsult_article['id']; ?>">修改</a>
       <?php echo link_to('删除', '/articles/delete?id='.$utoconsult_article['id'], array('method' => 'delete', 'confirm' => '确认删除?')); ?>
       </td>
    </tr>
    <?php endforeach; ?>

</table>
<?php endif; ?>