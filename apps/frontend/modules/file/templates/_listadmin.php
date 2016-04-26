<?php if (count($utoconsult_files)>0): ?>
<table border='0' class="table table-striped table-hover">
<thead>
    <tr class="ui-widget-header">
      <td>标题</td>
      <td>作者</td>
      <td>更新于</td>
      <td>管理</td>
    </tr>
</thead>
    <?php foreach ($utoconsult_files as $i=>$utoconsult_file): ?>
   
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">

      <td><a href="/file/single2/id/<?php echo $utoconsult_file['id']  ?>.html"><?php echo $utoconsult_file['title'] ?></a></td>
      <td><a href="/user/<?php echo $utoconsult_file['UtoconsultUser']['username'] ?>.html"><?php echo ($utoconsult_file['UtoconsultUser']['UtoconsultUserInformation']['realname'])?$utoconsult_file['UtoconsultUser']['UtoconsultUserInformation']['realname']:$utoconsult_file['UtoconsultUser']['username'] ?></a></td>
      <td><?php echo date('Y年m月d日',strtotime($utoconsult_file['updated_at']));
       ?></td>
       <td>
       <a href="/file/edit?id=<?php echo $utoconsult_file['id']; ?>">修改</a>
       <?php echo link_to('删除', '/file/delete?id='.$utoconsult_file['id'], array('method' => 'delete', 'confirm' => '确认删除?')); ?>
       </td>
    </tr>
    <?php endforeach; ?>

</table>
<?php endif; ?>